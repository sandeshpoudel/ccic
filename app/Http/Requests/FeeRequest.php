<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class FeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_fees');
        $canUpdate = Voyager::can('edit_fees');
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
            'fiscal_id' => 'required',
            'membershiptype_id' => 'required',
            'capitalfrom' => 'required',
            'capitalto' => 'required',
            'entry' => 'required',
            'annual' => 'required',
            'renew' => 'required',
        ];
    }
}
