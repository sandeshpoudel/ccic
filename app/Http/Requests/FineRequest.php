<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class FineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_fines');
        $canUpdate = Voyager::can('edit_fines');
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
            'startbs' => 'required',
            'startad' => 'required',
            'endad' => 'required',
            'endbs' => 'required',
            'fine' => 'required',

        ];
    }
}
