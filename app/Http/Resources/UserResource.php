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
            'country'                 => $this->country,
            'city'                    => $this->city,
            'experiences'             => ExperienceResource::collection($this->experiences),
            'educations'              => EducationResource::collection($this->educations),
            'image'                   =>'required|string',
            'about_me'                =>'nullable|string',
            'skills'                  => SkillResource::collection($this->skills),
            'english_lang'            =>'required|numeric',
            'georgian_lang'           =>'required|numeric',
            'marital_status'          =>'nullable|string',
            'birth_date'              =>'nullable|date'
        ];
    }
}
