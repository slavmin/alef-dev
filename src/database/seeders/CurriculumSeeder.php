<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\StudentClass;
use Illuminate\Database\Seeder;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = StudentClass::all();
        $lectures = Lecture::all();

        foreach ($classes as $class) {
            $classLectures = $lectures->random(rand(5, 10));

            $curriculum = [];
            $order = 1;

            foreach ($classLectures as $lecture) {
                $curriculum[$lecture->id] = ['order' => $order++];
            }

            $class->lectures()->sync($curriculum);
        }
    }
}
