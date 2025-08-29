<?php

use App\Models\Lecture;
use App\Models\StudentClass;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('class_lecture', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(StudentClass::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->foreignIdFor(Lecture::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->integer('order')->default(0);
            $table->timestamps();

            $table->unique(['student_class_id', 'lecture_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_lecture');
    }
};
