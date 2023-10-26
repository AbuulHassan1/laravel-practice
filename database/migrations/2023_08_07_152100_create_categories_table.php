<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->decimal('order_by', 5, 2)->default(0.00);
            $table->string('description');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->boolean('is_active')->default(1);
            $table->boolean('has_items')->default(0);
            $table->json('dynamic_fields')->nullable();
            $table->double('sort', 8, 2)->default(0.00);
            $table->string('heading')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
