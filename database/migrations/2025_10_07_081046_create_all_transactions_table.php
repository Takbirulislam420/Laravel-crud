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
        Schema::create('all_transactions', function (Blueprint $table) {
            $table->id();
            // 2 & 3. Foreign Keys to accounts table
            $table->unsignedBigInteger('user_id')->nullable()->index(); // Sender
            $table->unsignedBigInteger('receiver_id')->nullable()->index(); // Receiver
            // 4. Transaction type
            $table->enum('transaction_type', [
                'Send', 'Receive', 'Withdraw', 'Deposit',
                'Bkash', 'Nogod', 'Rocket', 'Upay',
                'mobile top-up', 'data top-up', 'bank transfer', 'commission'
            ]);
            // 5–8. Account related
            $table->string('account_number')->nullable();
            $table->text('bank_details')->nullable();
            $table->string('operator')->nullable();
            $table->string('account_type')->nullable();
            // 9–11. Balances
            $table->decimal('before_balance', 20,2)->default(0);
            $table->decimal('transaction_amount', 20,2)->default(0);
            $table->decimal('after_balance', 20,2)->default(0);
            // 12–13. Currency and status
            $table->string('currency', 10)->default('BDT');
            $table->enum('transaction_status', ['pending', 'completed', 'failed'])->default('pending');
            // 14. Transaction ID (external txn ID)
            $table->string('txn_id')->nullable();
                        // 15–16. Exchange rate & App charge
            $table->decimal('exchange_rate', 20,2)->nullable();
            $table->decimal('app_charge', 20,2)->nullable();
            // 17–18. Remark & Approved by
            $table->text('remark')->nullable();
            $table->unsignedBigInteger('approved_by')->nullable(); // FK to users table maybe
            // 19. BD Amount
            $table->decimal('bd_amount', 20,2)->nullable();
            // 20. Commission Reference
            $table->unsignedBigInteger('commission_reference_id')->nullable();
            $table->timestamps();
            // Foreign keys
            $table->foreign('user_id')->references('id')->on('user_accounts')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('user_accounts')->onDelete('cascade');
            $table->foreign('approved_by')->references('id')->on('user_accounts')->onDelete('cascade');
            $table->foreign('commission_reference_id')->references('id')->on('user_accounts')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('all_transactions');
    }
};
