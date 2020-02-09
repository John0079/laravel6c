<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->comment('博文标题');
            $table->string('introduce')->comment('博文介绍');
            $table->string('author')->comment('作者');
            $table->string('url')->unique()->comment('博文地址');
            $table->string('picture')->comment('博文图标');
            $table->json('tags')->nullable()->comment('博文标签');
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
        Schema::dropIfExists('articles');
    }
}
