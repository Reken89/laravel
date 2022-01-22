<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsModel extends Model
{
    use HasFactory;
    
    private $news = [
        1 => [
            'title' => 'Sport',
            'description' => 'Text'
        ],
        2 => [
            'title' => 'Science',
            'description' => 'Text'
        ]
    ];
    
    public function update(){
        
    }
    
}
