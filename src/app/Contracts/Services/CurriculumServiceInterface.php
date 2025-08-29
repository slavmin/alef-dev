<?php

declare(strict_types=1);

namespace App\Contracts\Services;

use App\Models\StudentClass;
use Illuminate\Database\Eloquent\Collection;

interface CurriculumServiceInterface
{
    public function getOne(StudentClass $class): Collection;

    public function update(StudentClass $class, array $lectures): void;
}
