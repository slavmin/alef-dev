<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\ServiceCommonInterface;
use App\Contracts\Services\LectureServiceInterface;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class LectureService implements LectureServiceInterface, ServiceCommonInterface
{
    public function getAll(): Collection
    {
        return Lecture::all();
    }

    public function getOne(int $id): Lecture
    {
        return Lecture::with(['classes', 'students.class'])->findOrFail($id);
    }

    public function create(array $data): Lecture
    {
        return Lecture::query()->create($data);
    }

    public function update(Lecture|Model $model, array $data): Lecture
    {
        $model->update($data);

        return $model->fresh();
    }

    public function delete(Lecture|Model $model): ?bool
    {
        return $model->delete();
    }
}
