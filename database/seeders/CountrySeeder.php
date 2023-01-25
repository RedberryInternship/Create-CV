<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CountrySeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$json = Storage::get('/json/countries.json');
		$countries = json_decode($json, true);
		foreach ($countries as $country)
		{
			Country::create([
				'name' => $country['name'],
			]);
		}
	}
}
