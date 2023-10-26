<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('owner_type', 50);
            $table->unsignedInteger('owner_id');
            $table->string('profile_id');
            $table->string('payment_processor', 50);
            $table->string('payment_profile_id');
            $table->string('account_type')->nullable();
            $table->string('payment_method_type');
            $table->string('expiration_date')->nullable();
            $table->string('brand', 50)->nullable();
            $table->string('last_4', 10)->nullable();
            $table->string('billing_first_name', 50)->nullable();
            $table->string('billing_last_name', 50)->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_unit', 20)->nullable();
            $table->string('billing_city', 50)->nullable();
            $table->string('billing_state', 30)->nullable();
            $table->string('billing_zip', 20)->nullable();
            $table->string('billing_country', 50)->nullable();
            $table->tinyInteger('default');
            $table->string('status');
            $table->boolean('is_verified');
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('payment_profiles');
    }
}
