<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->string('name', 100)->nullable()->index('companies_name_index');
            $table->string('slug', 100)->nullable()->index()->unique();
            $table->string('type', 50)->nullable();
            $table->string('url')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('about')->nullable();
            $table->mediumText('returns_and_refunds')->nullable();
            $table->mediumText('terms_and_conditions')->nullable();
            $table->mediumText('privacy_policy')->nullable();
            $table->mediumText('shipping')->nullable();
            $table->unsignedBigInteger('created_by')->index('companies_created_by_index');
            $table->timestamps();
            // comment out foreign key constraint before running migration as it is a circular migration with user
            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users')
            //     ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
