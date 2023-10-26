<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_id')->nullable()->index('seller_contacts_seller_id_index');
            $table->unsignedInteger('user_id')->nullable()->index('seller_contacts_user_id_index');
            $table->unsignedBigInteger('seller_detail_id')->nullable()->index('seller_contacts_seller_detail_id_index');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('seller_detail_id')
                ->references('id')
                ->on('seller_details')
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
        Schema::dropIfExists('seller_contacts');
    }
}
