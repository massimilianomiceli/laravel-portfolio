<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 20; $i++) {
            $newProject = new Project();

            $startingPeriod = $faker->dateTimeBetween('now', '+1 month');

            $endingLimit = (clone $startingPeriod)->modify('+10 weeks');

            $newProject->name = $faker->words(3, true);
            $newProject->period_start = $startingPeriod->format('Y-m-d');
            $newProject->period_end = $faker
                ->dateTimeBetween($startingPeriod, $endingLimit)
                ->format('Y-m-d');

            $newProject->summary = $faker->paragraph(4);
            $newProject->type_id = rand(1, 6);
            $newProject->save();
        }
    }
}
