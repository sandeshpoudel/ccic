<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class MembercontactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_membercontacts');
        $canUpdate = Voyager::can('edit_membercontacts');
        if($canAdd && $canUpdate)
        {
            return true;
        }
        else
        {
            // fix this with redirection
            return false;
        }
    }
    protected $errorBag = 'membercontacts';

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
            'name' => 'required',
            'position'=> 'required',
            'phone'=> 'required',
//            'email'=> 'ashish@iomelody.com'
        ];
    }
}
