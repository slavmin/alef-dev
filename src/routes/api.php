<?php

declare(strict_types=1);

use App\Http\Controllers\Api\ClassController;
use App\Http\Controllers\Api\LectureController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Student routes
Route::apiResource('students', StudentController::class);

// Class routes
Route::apiResource('classes', ClassController::class);
Route::match([SymfonyRequest::METHOD_PUT, SymfonyRequest::METHOD_PATCH], 'classes/{class}/curriculum', [ClassController::class, 'updateCurriculum']);
Route::get('classes/{class}/curriculum', [ClassController::class, 'curriculum']);

// Lecture routes
Route::apiResource('lectures', LectureController::class);
