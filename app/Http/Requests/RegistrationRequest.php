<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class RegistrationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_registrations');
        $canUpdate = Voyager::can('edit_registrations');
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
    protected $errorBag = 'registrations';

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
            'authority' => 'required',
            'number'=> 'required',
            'date'=> 'required',
        ];
    }
}
