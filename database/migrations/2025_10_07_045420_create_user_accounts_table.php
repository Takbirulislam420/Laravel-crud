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
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique(); // 2. Email (Unique)
            $table->string('password',250); // 3. Password (Hashed)
            $table->string('otp')->nullable(); // 4. OTP (Nullable)
            $table->string('account_number',10)->unique(); // 5. Account number (e.g., 270925-0001)
            $table->decimal('balance', 10, 2)->default(0.00); // 6. Balance, default 0.00 RM
            $table->enum('account_status', ['active', 'deactive','suspends','pending'])->default('pending'); // 7. Account status
            $table->enum('kyc_status', ['pending', 'verified'])->default('pending'); // 8. KYC status
            $table->string('bank_name',30)->nullable(); // 9. Bank name
            $table->string('account_holder_name',50)->nullable(); // 10. Account holder name
            $table->string('bank_account_number',50)->nullable(); // 11. Bank account number
            // 12–16: Referral levels
            $table->string('reffer_code_1',6)->nullable(); // 12. Referred by (1st level)
            $table->string('reffer_code_2',6)->nullable(); // 13. 2nd referral
            $table->string('reffer_code_3',6)->nullable(); // 14. 3rd referral
            $table->string('reffer_code_4',6)->nullable(); // 15. 4th referral
            $table->string('own_reffer_code', 6)->unique(); // 17. Own referral code (fixed 4–6 digits)
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_accounts');
    }
};
