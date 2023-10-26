<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('owner_type')->nullable()->index('transactions_owner_type_index');
            $table->unsignedInteger('owner_id')->nullable()->index('transactions_owner_id_index');
            $table->string('owner_name')->nullable()->index('transactions_owner_name_index');
            $table->string('payable_type', 50);
            $table->unsignedBigInteger('payable_id');
            $table->string('profile_id')->nullable();
            $table->string('payment_profile_id')->nullable();
            $table->string('ip_address', 50)->nullable();
            $table->string('payment_method_type', 50)->nullable();
            $table->string('account_type', 50)->nullable();
            $table->string('last_4', 10)->nullable();
            $table->string('provider', 50);
            $table->string('transaction_id');
            $table->string('transaction_reference_id')->nullable();
            $table->string('operation');
            $table->string('auth_code')->nullable();
            $table->double('amount', 8, 2);
            $table->double('fee', 8, 2)->nullable();
            $table->string('currency', 20)->nullable();
            $table->mediumText('description')->nullable();
            $table->string('status');
            $table->timestamps();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
