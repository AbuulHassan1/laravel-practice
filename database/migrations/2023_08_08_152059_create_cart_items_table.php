<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->string('owner_type', 50)->nullable()->index('cart_items_owner_type_index');
            $table->unsignedInteger('owner_id')->nullable()->index('cart_items_owner_id_index');
            $table->string('item_uuid')->nullable()->index('cart_items_item_uuid_index');
            $table->integer('qty');
            $table->double('price', 8, 2);
            $table->json('options')->nullable();
            $table->string('shiping_type')->nullable();
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
        Schema::dropIfExists('cart_items');
    }
}
