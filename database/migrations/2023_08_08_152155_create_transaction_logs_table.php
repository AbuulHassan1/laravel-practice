<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trans_id');
            $table->nullableMorphs('owner');
            $table->string('payable_type', 50);
            $table->unsignedBigInteger('payable_id');
            $table->string('profile_id')->nullable();
            $table->string('payment_profile_id')->nullable();
            $table->string('ip_address', 50)->nullable();
            $table->string('payment_method_type', 50)->nullable();
            $table->string('account_type', 50)->nullable();
            $table->string('currency', 20)->nullable();
            $table->string('last_4', 10)->nullable();
            $table->string('provider', 50);
            $table->string('transaction_id');
            $table->string('transaction_reference_id')->nullable();
            $table->string('operation');
            $table->string('auth_code')->nullable();
            $table->double('amount', 8, 2);
            $table->double('fee', 8, 2)->nullable();
            $table->mediumText('description')->nullable();
            $table->json('request')->nullable();
            $table->json('response')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_logs');
    }
}
