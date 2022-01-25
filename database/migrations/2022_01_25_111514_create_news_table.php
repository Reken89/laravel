<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    # Создаем таблицу news
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            #$table->id();
            #$table->timestamps();
            $table->bigIncrements('id')->comment('ID записи');
            $table->text('news')->comment('Содержание новости');
            $table->string('categories')->comment('Категория');
            $table->string('status')->comment('Статус');
            $table->string('sources')->comment('Источник');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    
    # Удаляем таблицу news
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
