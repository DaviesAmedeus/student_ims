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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->tinyInteger('user_type')->default(3)->comments(['1:admin', '2:teacher', '3:student', '4:parent']);
            $table->boolean('status')->default(true)->comments(['0(false):In active', '1(true):Active']);
            $table->boolean('is_delete')->default(false)->comments(['0:not deleted', '1:deleted']);
            $table->string('occupation')->nullable();
            $table->string('address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();

            $table->string('admission_number')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('roll_number')->nullable();
            $table->bigInteger('class_id')->nullable();
            $table->bigInteger('parent_id')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('caste')->nullable();
            $table->string('religion')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();



            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
