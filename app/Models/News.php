<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model

# Создаем новую модель для админки

{
    use HasFactory;
    
    # Исключаем поле из заполнения
    public $timestamps = false;
    
        protected $fillable = [
        'news',
        'categories',
        'status',
        'sources',
        'category_id'
    ];
}
