<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resellers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('company_name')->nullable()->index('resellers_company_name_index');
            $table->string('contact_firstname', 50)->nullable()->index('resellers_contact_firstname_index');
            $table->string('contact_lastname', 50)->nullable()->index('resellers_contact_lastname_index');
            $table->string('contact_email', 100)->nullable()->index('resellers_contact_email_index');
            $table->string('contact_phone', 20)->nullable()->index('resellers_contact_phone_index');
            $table->string('address')->nullable();
            $table->string('unit', 100)->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip', 20)->nullable();
            $table->string('status', 10)->default('active');
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
        Schema::dropIfExists('resellers');
    }
}
