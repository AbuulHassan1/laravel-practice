<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable()->index('items_uuid_index');
            $table->unsignedInteger('owner_id')->nullable()->index('items_account_id_index');
            $table->string('name');
            $table->string('meta_name')->nullable();
            $table->mediumText('description')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('condition')->nullable();
            $table->unsignedBigInteger('age')->default(1);
            $table->string('age_unit', 10)->nullable();
            $table->string('tags')->nullable();
            $table->unsignedBigInteger('category_id')->nullable()->index('items_category_id_index');
            $table->unsignedBigInteger('brand_id')->nullable()->index('items_brand_id_index');
            $table->decimal('price', 12, 2)->default(0.00);
            $table->decimal('item_seller_price', 12, 2)->default(0.00);
            $table->decimal('seller_price', 12, 2)->default(0.00);
            $table->boolean('is_mega_menu')->default(0);
            $table->decimal('final_price', 12, 2)->default(0.00);
            $table->string('price_scaling_low_price')->nullable();
            $table->string('price_scaling_high_price')->nullable();
            $table->integer('is_taxable')->default(1);
            $table->decimal('cost', 12, 2)->default(0.00);
            $table->decimal('discount', 5, 2)->default(0.00);
            $table->string('discount_unit', 10)->nullable();
            $table->boolean('scalling_price')->default(0);
            $table->integer('reseller_id')->nullable();
            $table->string('scalling_price_type', 50);
            $table->unsignedBigInteger('moq')->default(1);
            $table->unsignedInteger('total_qty')->default(0);
            $table->string('um')->nullable();
            $table->decimal('msrp', 12, 2)->default(0.00);
            $table->string('mpn')->nullable()->index('items_mpn_index');
            $table->decimal('weight', 8, 2)->default(0.00);
            $table->string('weight_unit', 10)->nullable();
            $table->decimal('length', 8, 2)->default(0.00);
            $table->string('length_unit', 10)->nullable();
            $table->decimal('width', 8, 2)->default(0.00);
            $table->string('width_unit', 10)->nullable();
            $table->decimal('height', 8, 2)->default(0.00);
            $table->string('height_unit', 10)->nullable();
            $table->json('package_type')->nullable();
            $table->string('upc')->nullable();
            $table->string('part_number')->nullable()->index('items_part_number_index');
            $table->string('sku')->nullable()->index('items_sku_index');
            $table->string('last_sku')->nullable();
            $table->string('type')->nullable();
            $table->dateTime('publish_date')->nullable();
            $table->boolean('is_active')->default(1);
            $table->decimal('custom_shipping_charges', 8, 2)->nullable();
            $table->string('shipping_calculator_type')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->boolean('is_read')->default(0);
            $table->unsignedInteger('reviews_total')->default(0);
            $table->decimal('reviews_avg', 8, 2)->default(0.00);
            $table->unsignedBigInteger('sale_count')->default(0)->index('items_sale_count_index');
            $table->string('shipping_type', 50)->nullable();
            $table->json('dynamic_fields')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade');
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
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
        Schema::dropIfExists('items');
    }
}
