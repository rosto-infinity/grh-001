<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id(); // 00-Colonne id, auto-incrémentée
            $table->string('job_title')->nullable(); // 001-Colonne job_title, par défaut null
            $table->decimal('min_salary', 10, 2)->nullable(); // Colonne min_salary, par défaut null
            $table->decimal('max_salary', 10, 2)->nullable(); // Colonne max_salary, par défaut null
            $table->timestamps(); // Colonne created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
