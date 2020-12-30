<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSubCatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_sub_cats', function (Blueprint $table) {
            $table->id();
            $table->string('post_sub_cat_title');
            $table->string('post_sub_cat_slug');
            $table->unsignedBigInteger('post_cat_id');
            $table->foreign('post_cat_id')->references('id')->on('post_cats')->onDelete('cascade');
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
        Schema::dropIfExists('post_sub_cats');
    }
}
