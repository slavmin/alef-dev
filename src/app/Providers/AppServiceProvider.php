<?php

declare(strict_types=1);

namespace App\Providers;

use App\Contracts\Services\ClassServiceInterface;
use App\Contracts\Services\CurriculumServiceInterface;
use App\Contracts\Services\LectureServiceInterface;
use App\Contracts\Services\StudentServiceInterface;
use App\Services\ClassService;
use App\Services\CurriculumService;
use App\Services\LectureService;
use App\Services\StudentService;
use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StudentServiceInterface::class, StudentService::class);
        $this->app->bind(ClassServiceInterface::class, ClassService::class);
        $this->app->bind(CurriculumServiceInterface::class, CurriculumService::class);
        $this->app->bind(LectureServiceInterface::class, LectureService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Date::use(CarbonImmutable::class);
        Model::shouldBeStrict();
    }
}
