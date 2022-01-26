<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;

class NewsController extends Controller
{

        # Вносим изменения в метод
        # Теперь метод будет получать информацию (массив) из Модели
        public function index(){

            $news = new NewsModel();

        return view('news_categories', ['news' => $news->select_all()]);

    }
    
        public function add(){
                     
        return view('add_news');
    }
    
            # Метод для получения данных из POST
            public function add_post(Request $request){
            
        $subject = $request->input('subject');
        $message = $request->input('message');
        
        # Редирект
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

