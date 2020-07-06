<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class ReceivableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_receivables');
        $canUpdate = Voyager::can('edit_receivables');
        if($canAdd && $canUpdate)
        {
            return true;
        }
        else
        {

            // fix this with redirection
            return false;
////            flash()->overlay('Modal Message', 'Modal Title');
//            return redirect('/staff/dashboard');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'member_id'=>'required',
            'heading' => 'required',
            'amount'=> 'required',
            'issuedate'=> 'required',
            'receiveddate'=> 'required',
            'status'=> 'required',
        ];
    }
}
