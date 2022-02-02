<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


# Модель для таблицы категории
class Categories extends Model
{
    use HasFactory;
    
            protected $fillable = [
        'name'
    ];
}
