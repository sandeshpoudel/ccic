<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //        return false;
        $canAdd = Voyager::can('add_events');
        $canUpdate = Voyager::can('edit_events');
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
            'fiscal_id' => 'required',
            'description' => 'required|min:3',
            'start' => 'required|min:3',
            'end' => 'required|min:3',
            'nepali' => 'required',
        ];
    }
}
