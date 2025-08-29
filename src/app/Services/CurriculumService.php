<?php

declare(strict_types=1);

namespace App\Services;

use App\Contracts\Services\CurriculumServiceInterface;
use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Collection;

class CurriculumService implements CurriculumServiceInterface
{
    public function getOne(StudentClass $class): Collection
    {
        return $class->load('lectures')->lectures;
    }

    public function update(StudentClass $class, array $lectures): void
    {
        $syncData = [];

        foreach ($lectures as $lecture) {
            $syncData[$lecture['lecture_id']] = ['order' => $lecture['order']];
        }

        $class->lectures()->sync($syncData);
    }
}
