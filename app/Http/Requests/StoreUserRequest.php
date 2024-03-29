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
			'name'                     => ['required', 'min:2', 'regex:/^[ა-ჰ]{0,999}$/'],
			'surname'                  => ['required', 'min:2', 'regex:/^[ა-ჰ]{0,999}$/'],
			'email'                    => ['required', 'email', 'ends_with:@redberry.ge'],
			'phone_number'             => ['required', 'starts_with:+995', 'max:13', 'min:13'],
			'about_me'                 => 'nullable|string',
			'experiences'              => 'required|array',
			'experiences.*.position'   => 'required|string|min:2',
			'experiences.*.employer'   => ['required', 'min:2', 'regex:/^[ა-ჰa-zA-Z0-9!@#$%^&*()_+= ]+$/'],
			'experiences.*.start_date' => 'required|date',
			'experiences.*.due_date'   => 'required|date',
			'experiences.*.description'=> 'required',
			'educations'               => 'required|array',
			'educations.*.institute'   => 'required|min:2',
			'educations.*.degree_id'   => ['required', 'numeric', Rule::exists('degrees', 'id')],
			'educations.*.due_date'    => 'required|date',
			'educations.*.description' => 'required',
			'image'                    => 'required|image',
		];
	}
}
