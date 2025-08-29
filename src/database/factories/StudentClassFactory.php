<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<StudentClass>
 */
class StudentClassFactory extends Factory
{
    protected $model = StudentClass::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $classNames = [
            '10-A', '10-B', '10-C',
            '11-A', '11-B', '11-C',
            '12-A', '12-B', '12-C',
            'Информатика-1', 'Информатика-2',
            'Математика-1', 'Математика-2',
            'Физика-1', 'Физика-2',
        ];

        return [
            'name' => $this->faker->unique()->randomElement($classNames),
        ];
    }
}
