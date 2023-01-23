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
			'token'                    => ['required', 'exists:tokens,token'],
			'name'                     => 'required|min:2',
			'surname'                  => 'required|min:2',
			'email'                    => 'required|email',
			'phone_number'             => 'required|numeric',
			'country_id'               => ['required', 'numeric', Rule::exists('countries', 'id')],
			'city'                     => 'required|string',
			'experiences.*.position'   => 'required|string|min:2',
			'experiences.*.employer'   => 'required|string|min:2',
			'experiences.*.start_date' => 'required|date',
			'experiences.*.due_date'   => 'required|date',
			'experiences.*.description'=> 'required',
			'educations.*.institute'   => 'required|min:2',
			'educations.*.degree_id'   => ['required', 'numeric', Rule::exists('degrees', 'id')],
			'educations.*.due_date'    => 'required|date',
			'educations.*.description' => 'required',
			'image'                    => 'required|image',
			'about_me'                 => 'nullable|string',
			'skills.*.title'           => 'required|string',
			'english_lang'             => 'required|numeric',
			'georgian_lang'            => 'required|numeric',
			'marital_status'           => 'nullable|string',
			'birth_date'               => 'nullable|date',
		];
	}
}
