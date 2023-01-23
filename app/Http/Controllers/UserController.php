<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserSkill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() : JsonResponse
    {
        return response()->json(UserResource::collection(User::all()), 200);
    }

    public function get(User $user) : JsonResponse
    {
        return response()->json(UserResource::make($user), 200);
    }

    public function store(StoreUserRequest $request,) : JsonResponse
    {
        $user = DB::transaction(
			function () use ($request) {
                $user = User::create($request->validated());

                foreach($request->experiences as $experience){
                    $newExperience = Experience::create([
                        'position' => $experience['position'],
                        'employer' => $experience['employer'],
                        'start_date' => $experience['start_date'],
                        'due_date' => $experience['due_date'],
                        'description' => $experience['description'],
                    ]);
                    UserExperience::create([
                        'user_id' => $user->id,
                        'experience_id' => $newExperience->id
                    ]);
                }

                foreach($request->educations as $education){
                    $newEducation = Education::create([
                        'institute' => $education['institute'],
                        'degree_id' => $education['degree_id'],
                        'due_date' => $education['due_date'],
                        'description' => $education['description'],
                    ]);
                    UserEducation::create([
                        'user_id' => $user->id,
                        'education_id' => $newEducation->id
                    ]);
                }

                foreach($request->skills as $skill){
                    $newSkill = Skill::create([
                        'title' => $skill['title'],
                    ]);
                    UserSkill::create([
                        'user_id' => $user->id,
                        'skill_id' => $newSkill->id
                    ]);
                }
                return $user;
			}
		);
        return response()->json(UserResource::make($user), 201);
    }
}
