<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DegreeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$degrees = json_decode(File::get(storage_path('json/degrees.json')));
		foreach ($degrees as $degree)
		{
			Degree::create([
				'title' => $degree->title,
			]);
		}
	}
}
