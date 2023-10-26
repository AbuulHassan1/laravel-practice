<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable()->index('files_uuid_index');
            $table->string('owner_type');
            $table->unsignedInteger('owner_id')->default(0);
            $table->string('type')->default('image');
            $table->string('label')->nullable();
            $table->string('description')->nullable();
            $table->string('filename');
            $table->string('original_name')->nullable();
            $table->string('path');
            $table->unsignedBigInteger('file_size')->nullable();
            $table->string('thumb_path')->nullable();
            $table->unsignedBigInteger('thumb_size')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->timestamps();
            $table->foreign('owner_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('created_by')
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
        Schema::dropIfExists('files');
    }
}
