<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
	 */
	public function toArray($request)
	{
		return [
			'id'                      => $this->id,
			'name'                    => $this->name,
			'surname'                 => $this->surname,
			'email'                   => $this->email,
			'phone_number'            => $this->phone_number,
			'about_me'                => $this->about_me,
			'experiences'             => ExperienceResource::collection($this->experiences),
			'educations'              => EducationResource::collection($this->educations),
			'image'                   => $this->image,
		];
	}
}
