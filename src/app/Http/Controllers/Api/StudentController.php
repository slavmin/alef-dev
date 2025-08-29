<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Contracts\Services\StudentServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StudentRequest;
use App\Models\Student;
use Illuminate\Http\JsonResponse;

class StudentController extends Controller
{
    public function __construct(protected StudentServiceInterface $studentService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $students = $this->studentService->getAll();

        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request): JsonResponse
    {
        $student = $this->studentService->create($request->validated());

        return response()->json($student, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student): JsonResponse
    {
        $student = $this->studentService->getOne($student->getKey());

        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student): JsonResponse
    {
        $student = $this->studentService->update($student, $request->validated());

        return response()->json($student);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student): JsonResponse
    {
        $this->studentService->delete($student);

        return response()->json(null, 204);
    }
}
