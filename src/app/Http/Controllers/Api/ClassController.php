<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Contracts\Services\ClassServiceInterface;
use App\Contracts\Services\CurriculumServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ClassRequest;
use App\Http\Requests\Api\CurriculumRequest;
use App\Models\StudentClass;
use Illuminate\Http\JsonResponse;

class ClassController extends Controller
{
    public function __construct(
        protected ClassServiceInterface $classService,
        protected CurriculumServiceInterface $curriculumService,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $classes = $this->classService->getAll();

        return response()->json($classes);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassRequest $request): JsonResponse
    {
        $class = $this->classService->create($request->validated());

        return response()->json($class, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentClass $class): JsonResponse
    {
        $class = $this->classService->getOne($class->getKey());

        return response()->json($class);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassRequest $request, StudentClass $class): JsonResponse
    {
        $class = $this->classService->update($class, $request->validated());

        return response()->json($class);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClass $class): JsonResponse
    {
        $this->classService->delete($class);

        return response()->json(null, 204);
    }

    /**
     * Display the specified resource curriculum.
     */
    public function curriculum(StudentClass $class): JsonResponse
    {
        $curriculum = $this->curriculumService->getOne($class);

        return response()->json($curriculum);
    }

    /**
     * Update the specified resource curriculum in storage.
     */
    public function updateCurriculum(CurriculumRequest $request, StudentClass $class): JsonResponse
    {
        $this->curriculumService->update($class, data_get($request->validated(), 'lectures', []));

        return response()->json(['message' => 'Curriculum updated']);
    }
}
