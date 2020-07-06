<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class InvoiceableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_invoiceables');
        $canUpdate = Voyager::can('edit_invoiceables');
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
            'title' => 'required|min:3',
            'description' => 'required',
            'nepali' => 'required',
            'status' => 'required',
        ];
    }
}
