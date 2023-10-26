<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScaledPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scaled_pricing', function (Blueprint $table) {
            $table->id();
            $table->string('solar_module')->nullable();
            $table->double('baywa_pricing', 8, 2)->nullable();
            $table->double('sunhub_pricing', 8, 2)->nullable();
            $table->double('weight', 8, 2)->nullable();
            $table->double('wattage', 8, 2)->nullable();
            $table->double('scaled_price', 8, 2)->nullable();
            $table->string('sunhub_url')->nullable();
            $table->string('baywa_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scaled_pricing');
    }
}
