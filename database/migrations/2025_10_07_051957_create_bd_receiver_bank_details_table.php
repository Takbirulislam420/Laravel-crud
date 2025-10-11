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
        Schema::create('bd_receiver_bank_details', function (Blueprint $table) {
            $table->id();
            // 2. Foreign key to user_accounts table
            $table->unsignedBigInteger('user_account_id');
            $table->foreign('user_account_id')
                  ->references('id')
                  ->on('user_accounts')
                  ->onDelete('cascade');
            $table->string('bank_name',30); // 3. Bank name
            $table->string('account_holder_name',30); // 4. Account holder name
            $table->string('account_number',30)->unique(); // 5. Bank account number (should be unique)
            $table->string('branch_name',100)->nullable(); // 7. Branch name
            $table->text('full_address')->nullable(); // 8. Full address of bank or branch
            $table->timestamps(); // created_at and updated_at
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bd_receiver_bank_details');
    }
};
