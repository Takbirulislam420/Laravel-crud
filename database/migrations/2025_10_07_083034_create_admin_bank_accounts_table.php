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
        Schema::create('admin_bank_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name',30);
            $table->string('bank_holder_name',50);
            $table->string('account_number',50);
            $table->string('status',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_bank_accounts');
    }
};
