<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoryController extends Controller
{
        public function add(){
                     
        $news = Categories::all();
            
        return view('add_category', ['category' => $news]);    
        
    }
}
