<?php

namespace App\Console\Commands;

use App\Fiscal;
use App\Member;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateFiscalAndMemberStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fiscal:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command updates the status of all members at the end of fiscal year. Make sure you have made backup of your database before running this command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        if ($this->confirm('Have you created database backup and next Fiscal Year?')) {
            //

            $currentfiscalyear = Fiscal::where('status', '1')->first();
            $expiringfiscalyearstart=Carbon::parse($currentfiscalyear->durationFromAd)->subYears(2);
            //find which fiscalyear's pending expires
            $expfiscal = Fiscal::whereDate('durationFromAd', $expiringfiscalyearstart->addDay(1))->first();

        // update membership status of members with more than two years of renewals left to expire
            Member::where('membershipstatus_id', 5)
                ->where('renewalfailedsince', $expfiscal->id)
                ->update(['membershipstatus_id' => 1]);
            $this->info('Step 1: Pending Members with two years of unpaid invoices updated with Expired status');

//             update active members to pending
            Member::where('membershipstatus_id', 4)
                ->where('renewalfailedsince', $currentfiscalyear->id)
                ->update(['membershipstatus_id' => 5]);
            $this->info('Step 2: Active Members updated with Pending Renewal status');

//            disable current fiscal year
            Fiscal::where('status', '1')->update(['status'=>0]);
            $this->info('Step 3: Disbled current fiscal year');

//           enable latest fiscal year
            $nextfiscalyear = $this->ask('What is the ID of next Fiscal Year?');
            Fiscal::where('id', $nextfiscalyear)->update(['status'=>1]);
            $this->info('Step 4: Enabled new fiscalyear');

        }else{
            $this->info('you selected no');
        }
    }
    
}
