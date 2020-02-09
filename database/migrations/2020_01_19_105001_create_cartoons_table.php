<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartoonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartoons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('视频标题');
            $table->string('introduce')->comment('视频简介');
            $table->string('author')->comment('作者');
            $table->string('url')->unique()->comment('视频地址');
            $table->string('picture')->comment('视频插图地址');
            $table->json('tags')->nullable()->comment('视频标签');
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
        Schema::dropIfExists('cartoons');
    }
}
