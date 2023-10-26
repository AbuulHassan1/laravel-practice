<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id')->index('package_item_package_id_index');
            $table->unsignedBigInteger('order_item_id')->index('package_item_order_item_id_index');
            $table->unsignedBigInteger('qty');
            $table->decimal('weight', 8, 2)->default(0.00);
            $table->string('weight_unit', 10)->nullable();
            $table->decimal('length', 8, 2)->default(0.00);
            $table->decimal('width', 8, 2)->default(0.00);
            $table->decimal('height', 8, 2)->default(0.00);
            $table->string('dimensions_unit', 10)->nullable();
            $table->timestamps();
            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
                ->onDelete('cascade');
            $table->foreign('order_item_id')
                ->references('id')
                ->on('order_items')
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
        Schema::dropIfExists('package_item');
    }
}
