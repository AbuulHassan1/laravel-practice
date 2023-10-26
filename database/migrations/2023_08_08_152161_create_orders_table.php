<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->nullable()->index('orders_order_number_index');
            $table->string('order_type')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('creator_id')->nullable();
            $table->string('customer_name', 50);
            $table->string('customer_email', 50)->nullable();
            $table->string('customer_phone', 20)->nullable();
            $table->string('customer_company', 50)->nullable();
            $table->double('total_amount')->default(0);
            $table->double('subtotal', 8, 2)->default(0.00);
            $table->string('stripe_charges')->nullable();
            $table->double('paid_amount')->default(0);
            $table->double('refund_amount', 8, 2)->nullable();
            $table->double('discount_amount', 8, 2)->nullable();
            $table->string('discount_code', 50)->nullable();
            $table->string('token')->nullable();
            $table->unsignedBigInteger('payment_profile_id')->nullable();
            $table->string('billing_first_name')->nullable();
            $table->string('billing_last_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_unit')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_zip')->nullable();
            $table->string('billing_country')->nullable();
            $table->mediumText('notes')->nullable();
            $table->unsignedInteger('total_payments')->default(0);
            $table->double('tax_base')->default(0);
            $table->double('tax')->default(0);
            $table->double('total_tax_amount')->default(0);
            $table->string('shipping_address')->nullable();
            $table->string('shipping_unit')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('shipping_method_code')->nullable();
            $table->string('shipping_tracking')->nullable();
            $table->string('shipping_status')->nullable();
            $table->double('shipping_cost', 8, 2)->nullable();
            $table->double('shipping_cost_estimated', 8, 2)->nullable();
            $table->string('tracking_url')->nullable();
            $table->string('tracking_number')->nullable();
            $table->dateTime('shipped_date')->nullable();
            $table->boolean('Shipped_sync')->default(0);
            $table->dateTime('delivery_date')->nullable();
            $table->string('status');
            $table->string('origin')->nullable();
            $table->unsignedBigInteger('payment_method_id')->default(0);
            $table->boolean('partial')->default(0);
            $table->double('min_payment', 8, 2)->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('payment_profile_id')
                ->references('id')
                ->on('payment_profiles')
                ->onDelete('cascade');
            $table->foreign('payment_method_id')
                ->references('id')
                ->on('payment_methods')
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
        Schema::dropIfExists('orders');
    }
}
