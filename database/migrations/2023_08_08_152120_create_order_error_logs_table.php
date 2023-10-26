<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderErrorLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_error_logs', function (Blueprint $table) {
            $table->id();
            $table->json('guest_user')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('code')->nullable();
            $table->text('message')->nullable();
            $table->text('stack_trace')->nullable();
            $table->timestamps();
            $table->boolean('is_read')->default(0);
            $table->foreign('user_id')
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
        Schema::dropIfExists('order_error_logs');
    }
}
