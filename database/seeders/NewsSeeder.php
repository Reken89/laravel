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
        DB::table('news')->insert($this->getData());
    }
    
    private function getData(){
        
        $faker = Faker\Factory::create(ru_RU);
        
        $data = [];
        
        for($a = 0; $a < 6; $a++){
            $data[] = [
                'news' => $faker->realText(rand(50, 100)),
                'categories' => 'test',
                'status' => 'OK',
                'sources' => $faker->realText(rand(10, 12)),
            ];
        }
        return $data;
    }
}
