<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    
    
        public function index(){
        return view('news_categories');
    }
    
        public function add(){
        return view('add_news');
    }
    
        public function categories($id){
                    
        return view('news')->with('categories',"$id");
    }
}

