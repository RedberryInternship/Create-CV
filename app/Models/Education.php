<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function degree()
    {
        return $this->belongsTo(Degree::class);
    }

    public function users()
	{
		return $this->belongsToMany(User::class, 'user_educations', 'education_id', 'user_id', );
	}
}
