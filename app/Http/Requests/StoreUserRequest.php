<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'token'                   =>'required|string',
            'name'                    => 'required|min:2',
            'surname'                 =>'required|min:2',
            'email'                   =>'required|email',
            'phone_number'            =>'required|numeric',
            'country_id'              =>['required', 'numeric', Rule::exists('countries', 'id')],
            'city'                    =>'required|string',
            'experience.*.position'   =>'required|string|min:2',
            'experience.*.employer'   =>'required|string|min:2',
            'experience.*.start_date' =>'required|date',
            'experience.*.due_date'   =>'required|date',
            'experience.*.description'=>'required',
            'education.*.institute'   =>'required|min:2',
            'education.*.degree_id'   =>['required', 'numeric', Rule::exists('degrees', 'id')],
            'education.*.due_date'    =>'required|date',
            'education.*.description' =>'required',
            'image'                   =>'required|string',
            'about_me'                =>'nullable|string',
            'skills.*.title'          =>'required|string',
            'english_lang'            =>'required|numeric',
            'georgian_lang'           =>'required|numeric',
            'marital_status'          =>'nullable|string',
            'birth_date'              =>'nullable|date'
        ];
    }
}
