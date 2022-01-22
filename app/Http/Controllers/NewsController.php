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
    
            public function add_post(Request $request){
            
        $subject = $request->input('subject');
        $message = $request->input('message');
        return response()->redirectToRoute('add_news');
        
        return view('add_news');
    }
    
        # Метод с передачей переменной в представление
        public function categories($id){                    
        #return view('news')->with('categories',"$id");
        return view('news', ['categories' => $id]);
    }
    
        # Метод с передачей переменной в представление
        public function one_news($id){  
        
            # Добавил массив с новостями, для передачи в представление
            $news = ["Новость про футбол", "Новость про хоккей", "Новость про биатлон", 
                    "Новость про университет", "Новость про лабораторию", "Новость про научные открытия", 
                    "Новости про машиныв", "Новость про самолеты", "Новость про лодки"];
            
        #return view('one_news')->with('number',"$id");
        return view('one_news', ['number' => $id, 'news' => $news]);
    }
}

