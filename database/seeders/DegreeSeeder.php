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
			'ხელოვნების ასოცირებული ხარისხი',
			'მეცნიერებათა ასოცირებული ხარისხი',
			'გამოყენებითი მეცნიერების ასოცირებული ხარისხი',
			'ხელოვნების ბაკალავრიატი',
			'მეცნიერების ბაკალავრი',
			'ბიზნეს ადმინისტრირების ბაკალავრი',
			'ხელოვნების მაგისტრი',
			'მეცნიერების მაგისტრი',
			'ბიზნეს ადმინისტრირების მაგისტრი',
			'იურისპრუდენციის დოქტორი',
			'იურიდიულის ბაკალავრი',
			'იურიდიულის მაგისტრი',
			'მედიცინის დოქტორი',
			'ბაკალავრი ტექნოლოგიებში',
			'ფილოსოფიის მაგისტრი',
			'ლიტერატურის მაგისტრი',
			'განათლების მაგისტრი',
			'მედიცინის ბაკალავრი',
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
