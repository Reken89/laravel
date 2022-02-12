<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                        # Редактируем таблицу users, добавляем столбик РОЛЬ
                        Schema::table('users', function (Blueprint $table) {

                            $table->string('role', 100)
                                    ->default(null);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                 Schema::dropColumns('users', ['role']);
        Schema::dropIfExists('role');
    }
}