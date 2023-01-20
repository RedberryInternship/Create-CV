<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\StoreExperienceRequest;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() : JsonResponse
    {
        return response()->json(User::all(), 200);
    }

    public function get(User $user) : JsonResponse
    {
        return response()->json($user, 200);
    }

    public function store(StoreUserRequest $request,) : JsonResponse
    {
        $data = DB::transaction(
			function () use ($request) {
                $user = User::create($request->validated());

                $experiences = Experience::create($request->experience);
				$educations = Education::create($request->education);
				$skills = Skill::create($request->skills);

                $experiences->users()->attach($user);
                $educations->users()->attach($user);
                $skills->users()->attach($user);

                return $user;
			}
		);
        return response()->json($data, 201);
    }
}
