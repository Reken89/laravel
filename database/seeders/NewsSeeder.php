<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('news')->insert([
                'news' => 'Пример новости',
                'categories' => 'test',
                'status' => 'OK',
                'sources' => 'Источник',
        ]);
    }
    
}
