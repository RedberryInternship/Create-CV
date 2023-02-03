<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$degrees = [
			'საშუალო სკოლის დიპლომი',
			'ზოგადსაგანმანათლებლო დიპლომი',
			'ბაკალავრი',
			'მაგისტრი',
			'დოქტორი',
			'ასოცირებული ხარისხი',
			'სტუდენტი',
			'კოლეჯი(ხარისიხს გარეშე)',
			'სხვა',
		];
		foreach ($degrees as $degree)
		{
			Degree::create([
				'title' => $degree,
			]);
		}
	}
}
