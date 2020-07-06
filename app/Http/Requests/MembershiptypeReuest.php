<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class MembershiptypeReuest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return false;

        $canAdd = Voyager::can('add_membershiptypes');
        $canUpdate = Voyager::can('edit_membershiptypes');
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
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'nepali' => 'required',
        ];
    }
}
