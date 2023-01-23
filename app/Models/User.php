<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function experiences()
	{
		return $this->belongsToMany(Experience::class, 'user_experiences', 'user_id', 'experience_id');
	}

    public function educations()
	{
		return $this->belongsToMany(Experience::class, 'user_education', 'user_id', 'education_id');
	}

    public function skills()
	{
		return $this->belongsToMany(Skill::class, 'user_skills', 'user_id', 'skill_id');
	}
}
