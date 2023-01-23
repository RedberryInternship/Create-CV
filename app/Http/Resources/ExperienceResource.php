<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
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
			'id'         => $this->id,
			'position'   => $this->position,
			'employer'   => $this->employer,
			'start_date' => $this->start_date,
			'due_date'   => $this->due_date,
			'description'=> $this->description,
		];
	}
}
