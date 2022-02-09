<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use App\Models\News;
use App\Http\Requests\NewsSaveRequest;
use Illuminate\Support\Facades\App;

class NewsController extends Controller
{

        # Вносим изменения в метод
        # Теперь метод будет получать информацию (массив) из Модели
        public function index(){

            #$news = new NewsModel();
            $news = News::all();

        return view('news_categories', ['news' => $news]);
        #return view('news_categories', ['news' => $news->select_all()]);

    }
    
        # Выводим все новости в админке
        public function add(Request $request){
                     
        $news = News::all();
        
        # Если значение пустое то используем по умолчанию русскую локальзацию
        if (empty($request->input('locale'))) {
            \App::setLocale('ru');
            $locale = __('labels.test');
            
        # Если значение не пустое, тогда используем локализацию в зависимости от выбора пользователя    
        } else {
            $a = $request->input('locale');
            \App::setLocale($a);            
            $locale = __('labels.test');
        }
            
        return view('add_news', ['news' => $news, 'locale' => $locale]);    
        
    }
    
                    # Удаляем определенную новость
                    public function delete(Request $request){
            
                        $id = $request->input('id');
                        $news = News::destroy($id);
        
                    # Редирект
                    return response()->redirectToRoute('add_news');

                    return view('add_news');
    }
    
                # Добавляем новую новость
                public function add_post(NewsSaveRequest $request){
            
                    $news = new News();
                    $news->fill([
                        'news' => $request->input('message'),
                        'categories' => $request->input('categories'),
                        'status' => 'OK',
                        'sources' => 'Источник',
                        'category_id' => $request->input('category_id'),
                    ]);
  
                    $news->save();

                    # Редирект
                    return response()->redirectToRoute('add_news');

                    return view('add_news');
    }
    
    
    
            # Обновляем уже существующую новость
            public function update_post(Request $request){
            
                
                $id = $request->input('id');

                        
                $news = News::find($id);

                $news->news = $request->input('message');
                $news->categories = $request->input('categories');
                
                $news->save();

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

