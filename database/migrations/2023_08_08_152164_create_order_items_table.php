<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_id');
            $table->string('name');
            $table->string('sku')->nullable();
            $table->mediumText('description')->nullable();
            $table->integer('qty');
            $table->double('price', 8, 2);
            $table->decimal('item_seller_price', 12, 2)->default(0.00);
            $table->double('taxes', 8, 2)->nullable();
            $table->double('discount')->nullable();
            $table->string('supplier_order_number')->nullable();
            $table->enum('status', ['pending', 'in-process', 'shipped'])->default('pending');
            $table->string('tracking_url')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('shipped_date')->nullable();
            $table->string('Shipped_sync')->nullable();
            $table->string('delivery_date')->nullable();
            $table->json('options')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
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
        Schema::dropIfExists('order_items');
    }
}
