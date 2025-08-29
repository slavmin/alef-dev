<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceCommonInterface;
use App\Contracts\Services\StudentServiceInterface;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class StudentService implements ServiceCommonInterface, StudentServiceInterface
{
    public function getAll(): Collection
    {
        return Student::with('class')->get();
    }

    public function getOne(int $id): Student
    {
        return Student::with(['class', 'lectures'])->findOrFail($id);
    }

    public function create(array $data): Student
    {
        return Student::query()->create($data);
    }

    public function update(Student|Model $model, array $data): Student
    {
        $model->update($data);

        return $model->fresh();
    }

    public function delete(Student|Model $model): ?bool
    {
        return $model->delete();
    }
}
