<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_invoices');
        $canUpdate = Voyager::can('edit_invoices');
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
            'member_id' => 'required',
            'date' => 'required',
            'duedate' => 'required',
//            'total' => 'required',
            'paidamount' => 'required',
            'status' => 'required',
            'method' => 'required',
            'paymentby'  => 'required',
        ];
    }
}
