<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBulkSavingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bulk_savings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('items_id')->nullable()->index('bulk_savings_items_id_index');
            $table->double('min_qty', 8, 2);
            $table->double('max_qty', 8, 2);
            $table->double('discounted_price', 8, 2);
            $table->double('discount', 8, 2);
            $table->double('seller_price', 8, 2)->default(0.00);
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->foreign('items_id')
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
        Schema::dropIfExists('bulk_savings');
    }
}
