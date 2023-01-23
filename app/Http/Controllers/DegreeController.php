<?php

namespace App\Http\Controllers;

use App\Http\Resources\DegreeResource;
use App\Models\Degree;
use Illuminate\Http\JsonResponse;

class DegreeController extends Controller
{
	public function index(): JsonResponse
	{
		return response()->json(DegreeResource::collection(Degree::all()), 200);
	}
}
