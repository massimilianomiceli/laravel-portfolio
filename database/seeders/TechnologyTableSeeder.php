<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Faker\Generator as Faker;

class TechnologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        $technologies = [ 'HTML','CSS','Sass','Bootstrap','JavaScript','React','Vue.js','PHP','Laravel','Node.js','Express.js','MySQL','Git','GitHub',];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor();
            $newTechnology->save();
        }
    }
}
