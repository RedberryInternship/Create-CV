<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\JsonResponse;

class CityController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(CityResource::collection(City::all()), 200);
	}
}
