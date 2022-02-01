<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\CategoriesSaveRequest;

class CategoryController extends Controller
{
        public function add(){
                     
        $news = Categories::all();
            
        return view('add_category', ['category' => $news]);    
        
    }
    
                public function update_post(Request $request){
            
                
                $id = $request->input('id');

                        
                $categories = Categories::find($id);

                $categories->name = $request->input('name');
                
                
                $categories->save();

                # Редирект
                return response()->redirectToRoute('add_category');

                return view('add_category');

            }
            
                  public function add_post(CategoriesSaveRequest $request){
            
                      \App::setLocale('ru');
                      
                    $categories = new Categories();
                    $categories->fill([
                        'name' => $request->input('name')

                    ]);
  
                    $categories->save();

                    # Редирект
                    return response()->redirectToRoute('add_category');

                    return view('add_category');
    }
    
                        public function delete(Request $request){
            
                        $id = $request->input('id');
                        $categories = Categories::destroy($id);
        
                    # Редирект
                    return response()->redirectToRoute('add_category');

                    return view('add_category');
    }
            
}
