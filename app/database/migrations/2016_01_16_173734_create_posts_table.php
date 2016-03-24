<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function($table)
        {
            // Группа
            $table->enum('group', array(
                'french',
                'design',
                'extension',
            ))->index;
            // Имя
            $table->string('name');
            // Фото
            $table->string('photo');
            // Тамбнэйл
            $table->string('thumbnail');
            // Комментарий
            $table->text('post_prev_text');
            $table->text('description');
            // Кто добавил
            $table->integer('user_id')->index()->unsigned();
            // Счетчик просмотров
            $table->integer('views')->unsigned();
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
        Schema::drop('posts');
    }

}
