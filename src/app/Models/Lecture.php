<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\LectureFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property mixed $classes
 * @property mixed $students
 */
class Lecture extends Model
{
    /** @use HasFactory<LectureFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'topic',
        'description',
    ];

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(StudentClass::class, 'class_lecture')
            ->withPivot('order');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class, 'student_lecture')
            ->withTimestamps();
    }
}
