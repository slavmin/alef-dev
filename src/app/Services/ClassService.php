<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceCommonInterface;
use App\Contracts\Services\ClassServiceInterface;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ClassService implements ClassServiceInterface, ServiceCommonInterface
{
    public function getAll(): Collection
    {
        return StudentClass::all();
    }

    public function getOne(int $id): StudentClass
    {
        return StudentClass::with('students')->findOrFail($id);
    }

    public function create(array $data): StudentClass
    {
        return StudentClass::query()->create($data);
    }

    public function update(StudentClass|Model $model, array $data): StudentClass
    {
        $model->update($data);

        return $model->fresh();
    }

    public function delete(StudentClass|Model $model): ?bool
    {
        $model->students()->update(['student_class_id' => null]);

        return $model->delete();
    }
}
