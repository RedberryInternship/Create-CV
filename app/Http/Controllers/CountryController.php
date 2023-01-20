<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CountryController extends Controller
{
    public function index() :JsonResponse 
    {
        return response()->json(CountryResource::collection(Country::all()), 200);
    }
}
