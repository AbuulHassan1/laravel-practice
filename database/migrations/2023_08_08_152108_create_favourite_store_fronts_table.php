<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteStoreFrontsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite_store_fronts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable()->index('favourite_store_fronts_user_id_index');
            $table->unsignedBigInteger('seller_detail_id')->nullable()->index('favourite_store_fronts_seller_detail_id_index');
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
        Schema::dropIfExists('favourite_store_fronts');
    }
}
