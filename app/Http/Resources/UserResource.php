<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'                      => $this->id,
            'token'                   => $this->token,
            'name'                    => $this->name,
            'surname'                 => $this->surname,
            'email'                   => $this->email,
            'phone_number'            => $this->phone_number,
            'country'                 => CountryResource::make($this->country),
            'city'                    => $this->city,
            'experiences'             => ExperienceResource::collection($this->experiences),
            'educations'              => EducationResource::collection($this->educations),
            'image'                   => $this->image,
            'about_me'                => $this->about_me,
            'skills'                  => SkillResource::collection($this->skills),
            'english_lang'            => $this->english_lang,
            'georgian_lang'           => $this->georgian_lang,
            'marital_status'          => $this->marital_status,
            'birth_date'              => $this->birth_date
        ];
    }
}
