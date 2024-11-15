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
        Schema::create('class_subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->nullable();
            $table->bigInteger('subject_id')->nullable();
            $table->boolean('status')->default(true)->comments(['0(false):In active', '1(true):Active']);
            $table->boolean('is_delete')->default(false)->comments(['0(false):Not deleted', '1(true):Deleted']);
            $table->tinyInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_subjects');
    }
};
