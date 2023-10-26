<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname', 100)->nullable();
            $table->string('lastname', 100)->nullable();
            $table->string('company_name')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->index('users_email_index');
            $table->unsignedBigInteger('company_id')->nullable()->index('users_company_id_index');
            $table->string('password');
            $table->string('status')->default('active');
            $table->unsignedInteger('affiliate_id')->default(0);
            $table->decimal('percent', 10, 2)->default(0.00);
            $table->string('pending_balance')->default('0.00');
            $table->decimal('available_balance', 8, 2)->default(0.00);
            $table->string('avatar')->nullable();
            $table->unsignedMediumInteger('cart_count')->default(0);
            $table->json('security_questions')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->rememberToken();
            $table->dateTime('email_verified_at')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
