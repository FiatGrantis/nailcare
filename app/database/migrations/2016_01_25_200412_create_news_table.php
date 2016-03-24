<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function($table)
        {
            // Название
            $table->string('news_name');
            // Фото
            $table->string('news_photo');
            // Тамбнэйл
            $table->string('news_thumbnail');
            // Комментарий
            $table->text('news_prev_text');
            $table->text('news_text');
            // Кто добавил
            $table->integer('user_id')->index()->unsigned();
            $table->increments('id');
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
        Schema::drop('news');
    }

}
