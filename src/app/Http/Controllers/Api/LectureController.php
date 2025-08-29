<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Contracts\Services\LectureServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LectureRequest;
use App\Models\Lecture;
use Illuminate\Http\JsonResponse;

class LectureController extends Controller
{
    public function __construct(protected LectureServiceInterface $lectureService) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $lectures = $this->lectureService->getAll();

        return response()->json($lectures);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LectureRequest $request): JsonResponse
    {
        $lecture = $this->lectureService->create($request->validated());

        return response()->json($lecture, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture): JsonResponse
    {
        $lecture = $this->lectureService->getOne($lecture->getKey());

        return response()->json($lecture);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LectureRequest $request, Lecture $lecture): JsonResponse
    {
        $lecture = $this->lectureService->update($lecture, $request->validated());

        return response()->json($lecture);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture): JsonResponse
    {
        $this->lectureService->delete($lecture);

        return response()->json(null, 204);
    }
}
