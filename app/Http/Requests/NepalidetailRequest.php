<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class NepalidetailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //        return false;
        $canAdd = Voyager::can('add_nepalidetails');
        $canUpdate = Voyager::can('edit_nepalidetails');
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
//            'member_id' => 'required',
            'propritorsname' => 'required',
            'fulladdress' => 'required'
        ];
    }
}
