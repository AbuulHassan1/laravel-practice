<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id')->nullable()->index('packages_user_id_index');
            $table->unsignedBigInteger('reseller_id')->nullable()->index('packages_reseller_id_index');
            $table->unsignedBigInteger('item_id')->nullable()->index('packages_item_id_index');
            $table->unsignedBigInteger('order_id')->index('packages_order_id_index');
            $table->unsignedBigInteger('location_id')->index('packages_location_id_index');
            $table->string('shipping_type', 50)->nullable();
            $table->string('shipping_service_type', 100)->nullable();
            $table->decimal('shipping_cost_estimated', 8, 2)->nullable();
            $table->decimal('shipping_cost', 8, 2)->nullable();
            $table->string('carrier')->nullable()->index('packages_carrier_index');
            $table->string('tracking_id')->nullable()->index('packages_tracking_id_index');
            $table->string('shipping_status')->nullable();
            $table->json('events')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('reseller_id')
                ->references('id')
                ->on('resellers')
                ->onDelete('cascade');
            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('cascade');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
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
        Schema::dropIfExists('packages');
    }
}
