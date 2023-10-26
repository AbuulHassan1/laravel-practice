<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->integer('custom_id')->nullable();
            $table->boolean('is_profile_address')->default(0);
            $table->string('name', 50);
            $table->unsignedBigInteger('reseller_id')->nullable();
            $table->string('address');
            $table->string('unit', 50)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 100)->nullable();
            $table->string('zip', 20)->nullable();
            $table->string('country', 100)->nullable();
            $table->unsignedInteger('user_id')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('reseller_id')
                ->references('id')
                ->on('resellers')
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
        Schema::dropIfExists('locations');
    }
}
