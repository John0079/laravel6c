<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParagraphsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paragraphs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('index_code')->unique()->comment('序号编码');
            $table->string('title')->comment('段落标题');
            $table->string('title_translation')->comment('段落标题翻译');
            $table->string('content')->comment('段落内容');
            $table->string('content_translation')->comment('段落内容翻译');
            $table->json('translators')->nullable()->comment('翻译者，可能是多个人');
            $table->string('doc_type')->default("")->comment('指定是哪个文档');
            $table->smallInteger('complete_status')->default(0)->comment('是否翻译完整');
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
        Schema::dropIfExists('paragraphs');
    }
}
