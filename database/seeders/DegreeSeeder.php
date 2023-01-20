<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'სხვა' 
        ];
        foreach($degrees as $degree){
            DB::table('degrees')->insert([
                'title' => $degree,
            ]);
        }
    }
}
