<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('krrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahasiswa_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('mata_kuliah_id')->constrained('mata_kuliahs')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['mahasiswa_id', 'mata_kuliah_id']); // Prevent duplicate entries
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('krrs');
    }
};
