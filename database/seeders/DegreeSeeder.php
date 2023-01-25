<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DegreeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$json = Storage::get('/json/degrees.json');
		$degrees = json_decode($json, true);
		foreach ($degrees as $degree)
		{
			Degree::create([
				'title' => $degree['title'],
			]);
		}
	}
}
