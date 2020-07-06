<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use TCG\Voyager\Facades\Voyager;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $canAdd = Voyager::can('add_members');
        $canUpdate = Voyager::can('edit_members');
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
            'name'=> 'required|min:3',
            'details'=> 'nullable',
            'category_id'=> 'required',
            'capital'=> 'required|numeric',
            'nature'=> 'required',
            'membershiptype_id'=> 'required',
            'ownershiptype_id'=> 'required',
            'startDate'=> 'required|date',
            'nepalistartdate'=> 'required',
            'location_id'=> 'required',
            'ward'=> 'required|numeric',
            'chowk'=> 'required',
            'tole'=> 'nullable',
            'phone'=> 'required',
            'website'=> 'nullable',
            'email'=> 'nullable',
            'fax'=> 'nullable',
            'proprietorName'=> 'required',
            'proprietorPhone'=> 'required',
            'proprietorMobile'=> 'required',
            'gender'=> 'required',
            'nationality'=> 'required',
            'citizenship'=> 'required',
            'landlord'=> 'nullable',
            'charkilla'=> 'nullable',
            'applicantName'=> 'required',
            'applicationRelation'=> 'required',
            'membershipstatus_id'=> 'required',
            'applicationDate'=> 'nullable',
            'applicationDateInBS'=> 'required',
            'applicationDateInAD'=> 'required',
            'renewalfailedsince' => 'required',
            'photo' => 'mimes:jpeg,jpg,png|max:2048',
            'applicationApprovalDateInBS'=> 'nullable',
            'applicationApprovalDateInAD'=> 'nullable',
        ];


    }
//    protected $dates = ['nepalistartdate'];
//    public function setDates($dates)
//    {
//        $this->dates=$dates;
//        return $this;
//    }
}
