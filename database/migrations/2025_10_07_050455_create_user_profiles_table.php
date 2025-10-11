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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            // Foreign key to accounts table
            $table->unsignedBigInteger('user_account_id');
            $table->foreign('user_account_id')->references('id')->on('user_accounts')->onDelete('cascade');
            $table->string('f_name',50); // First name
            $table->string('l_name',50); // Last name
            $table->string('image_path')->nullable();
            $table->string('phone_number',20)->nullable(); // Phone number
            $table->string('nationality',30)->nullable(); // Nationality
            $table->string('document_type',30)->nullable(); // e.g., Passport, ID, etc.
            $table->string('passport_number',30)->nullable();
            $table->string('date_of_issue')->nullable();
            $table->string('expired_date')->nullable();
            $table->string('passport_photo')->nullable(); // File path or URL
            $table->text('company_name_and_address',250)->nullable(); // Company details
            $table->text('current_address',250)->nullable(); // Residential address
            $table->string('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->timestamps(); // created_at, updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
