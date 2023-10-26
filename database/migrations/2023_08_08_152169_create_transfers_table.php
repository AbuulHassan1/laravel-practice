<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->string('account_id');
            $table->unsignedInteger('user_id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->double('package_price', 8, 2)->unsigned()->nullable();
            $table->double('package_shipping', 8, 2)->unsigned()->nullable();
            $table->string('order_number');
            $table->double('order_amount', 8, 2);
            $table->double('transfer_amount', 8, 2);
            $table->double('platform_fee', 8, 2);
            $table->string('platform_fee_type');
            $table->double('paid_platform_fee', 8, 2);
            $table->double('processor_fee', 8, 2);
            $table->string('processor_fee_type');
            $table->double('paid_processor_fee', 8, 2);
            $table->string('transfer_group')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('parent_transaction_id');
            $table->string('transfer_id')->nullable();
            $table->double('amount_reversed', 8, 2)->default(0.00);
            $table->string('status');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');
            $table->foreign('package_id')
                ->references('id')
                ->on('packages')
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
        Schema::dropIfExists('transfers');
    }
}
