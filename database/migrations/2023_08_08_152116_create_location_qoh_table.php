<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationQohTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location_qoh', function (Blueprint $table) {
            $table->unsignedBigInteger('item_id')->index('location_qoh_item_id_index');
            $table->unsignedBigInteger('location_id')->index('location_qoh_location_id_index');
            $table->unsignedInteger('qoh')->default(0);
            $table->timestamps();
            
            $table->unique(['item_id', 'location_id'], 'location_qoh_item_id_location_id_unique');
            $table->foreign('item_id')
                ->references('id')
                ->on('items')
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
        Schema::dropIfExists('location_qoh');
    }
}
