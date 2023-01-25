<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Token;
use App\Models\User;
use App\Models\UserEducation;
use App\Models\UserExperience;
use App\Models\UserSkill;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function index(Token $token): JsonResponse
	{
		return response()->json(UserResource::collection($token->users), 200);
	}

	public function get(Token $token, int $id): JsonResponse
	{
		$user = User::where([['token_id', $token->id], ['key', $id]])->first();
		return response()->json(UserResource::make($user), 200);
	}

	public function store(StoreUserRequest $request): JsonResponse
	{
		$data = DB::transaction(
			function () use ($request) {
				$token = Token::where('token', $request->token)->first();
				$image = $request->file('image')->store('images');
				$user = User::create([
					'image'                    => '/storage/' . $image,
					'token_id'                 => $token->id,
					'name'                     => $request->name,
					'surname'                  => $request->surname,
					'email'                    => $request->email,
					'phone_number'             => $request->phone_number,
					'country_id'               => $request->country_id,
					'city'                     => $request->city,
					'about_me'                 => $request->about_me,
					'english_lang'             => $request->english_lang,
					'georgian_lang'            => $request->georgian_lang,
					'marital_status'           => $request->marital_status,
					'birth_date'               => $request->birth_date,
				]);
				foreach ($request->experiences as $experience)
				{
					$newExperience = Experience::create([
						'position'    => $experience['position'],
						'employer'    => $experience['employer'],
						'start_date'  => $experience['start_date'],
						'due_date'    => $experience['due_date'],
						'description' => $experience['description'],
					]);
					UserExperience::create([
						'user_id'       => $user->id,
						'experience_id' => $newExperience->id,
					]);
				}

				foreach ($request->educations as $education)
				{
					$newEducation = Education::create([
						'institute'   => $education['institute'],
						'degree_id'   => $education['degree_id'],
						'due_date'    => $education['due_date'],
						'description' => $education['description'],
					]);
					UserEducation::create([
						'user_id'      => $user->id,
						'education_id' => $newEducation->id,
					]);
				}

				foreach ($request->skills as $skill)
				{
					$newSkill = Skill::create([
						'title' => $skill['title'],
					]);
					UserSkill::create([
						'user_id'  => $user->id,
						'skill_id' => $newSkill->id,
					]);
				}
				return ['message' => 'Information recorded'];
			}
		);
		return response()->json($data, 201);
	}
}
