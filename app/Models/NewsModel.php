<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;
    
    # Массив, допустим что получен из БД
    private $news = [
        1 => [
            'title' => 'Sport',
            'description' => 'Text',
            'id_category' => '10'
        ],
        2 => [
            'title' => 'Science',
            'description' => 'Text',
            'id_category' => '11'
        ]
    ];
    
    # Метод для проверки, что массив содержит новости с ID равным 10
    public function GetByID(int $categoryid) {
        
        $return = [];
        foreach ($this->news as $item){
            if($item['id_category'] == $categoryid){
                $return[] = $item;
            }
        }
        return $return;
    }
    
}
