<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique()->comment('牌组名称');
            $table->float('size')->comment('牌组大小');
            $table->string('icon')->comment('牌组图标');
            $table->bigInteger('maker_id')->comment('内容制作者');
            $table->bigInteger('designer_id')->comment('模板设计者');
            $table->bigInteger('developer_id')->comment('模板开发者');
            $table->string('show_pictures')->comment('展示牌组的图片');
            $table->json('detail_pictures')->comment('牌组详情的图片');
            $table->string('gif')->comment('展示卡片的动图');
            $table->string('description')->comment('牌组简介');
            $table->string('url')->comment('牌组地址');
            $table->bigInteger('download_times')->comment('下载次数');
            $table->json('tags')->nullable()->comment('牌组标签');
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
        Schema::dropIfExists('decks');
    }
}
