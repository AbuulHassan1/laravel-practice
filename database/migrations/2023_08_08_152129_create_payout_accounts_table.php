<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payout_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->unsignedInteger('user_id');
            $table->string('owner_email');
            $table->string('type');
            $table->tinyInteger('charges_enabled');
            $table->tinyInteger('payouts_enabled');
            $table->string('country')->nullable();
            $table->string('default_currency')->nullable();
            $table->string('business_type')->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_url')->nullable();
            $table->boolean('debit_negative_balances')->default(0);
            $table->string('provider');
            $table->string('status');
            $table->timestamps();
            $table->foreign('user_id')
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
        Schema::dropIfExists('payout_accounts');
    }
}
