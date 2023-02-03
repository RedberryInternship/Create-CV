<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
	use HasApiTokens;

	use HasFactory;

	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array<int, string>
	 */
	protected $guarded = ['id'];

	public function experiences()
	{
		return $this->belongsToMany(Experience::class, 'user_experiences', 'user_id', 'experience_id');
	}

	public function educations()
	{
		return $this->belongsToMany(Education::class, 'user_education', 'user_id', 'education_id');
	}
}
