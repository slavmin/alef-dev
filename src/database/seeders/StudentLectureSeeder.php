<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentLectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::all();
        $lectures = Lecture::all();

        foreach ($students as $student) {
            // Каждый студент прослушал случайные лекции (1-5 лекций)
            $attendedLectures = $lectures->random(rand(1, 5));

            $student->lectures()->sync($attendedLectures->pluck('id'));
        }
    }
}
