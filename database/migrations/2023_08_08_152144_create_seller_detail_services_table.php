<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerDetailServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_detail_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('seller_detail_id')->nullable()->index('seller_detail_services_seller_detail_id_index');
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('seller_detail_services');
    }
}
