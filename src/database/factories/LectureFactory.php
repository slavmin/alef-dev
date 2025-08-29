<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lecture>
 */
class LectureFactory extends Factory
{
    protected $model = Lecture::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $topics = [
            'Введение в программирование',
            'Основы алгоритмов',
            'Структуры данных',
            'Объектно-ориентированное программирование',
            'Базы данных и SQL',
            'Веб-разработка',
            'Мобильная разработка',
            'Машинное обучение',
            'Кибербезопасность',
            'DevOps практики',
            'Тестирование программного обеспечения',
            'Архитектура программного обеспечения',
            'Паттерны проектирования',
            'Системное программирование',
            'Сетевые технологии',
        ];

        return [
            'topic' => $this->faker->unique()->randomElement($topics),
            'description' => $this->faker->paragraph(3),
        ];
    }
}
