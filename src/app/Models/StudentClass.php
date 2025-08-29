<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\StudentClassFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property mixed $students
 * @property mixed $lectures
 */
class StudentClass extends Model
{
    /** @use HasFactory<StudentClassFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name'];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'student_class_id');
    }

    public function lectures(): BelongsToMany
    {
        return $this->belongsToMany(Lecture::class, 'class_lecture')
            ->withPivot('order')
            ->orderBy('order');
    }
}
