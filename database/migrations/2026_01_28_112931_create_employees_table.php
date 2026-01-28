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
            Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('full_name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('dob');
            $table->string('national_id')->unique();
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->date('hire_date');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('position_id');
            $table->enum('employee_type', ['full_time', 'part_time', 'contract']);
            $table->enum('status', ['active', 'inactive', 'terminated']);
            $table->string('profile_photo')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('department_id')
                  ->references('department_id')
                  ->on('departments')
                  ->onDelete('cascade');

            $table->foreign('position_id')
                  ->references('position_id')
                  ->on('positions')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
