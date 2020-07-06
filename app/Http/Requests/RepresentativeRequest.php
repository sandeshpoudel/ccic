<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class RepresentativeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_representatives');
        $canUpdate = Voyager::can('edit_representatives');
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
        return [           //

            'member_id'=>'required',
            'event_id' => 'required',
            'name'=> 'required',
            'nepali'=> 'required',
            'relation'=>'required',
            'phone'=>'required'
        ];
    }
}
