<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    # Выводим список всех пользователей
    public function add(){
        
        # Записываем в сессию админа
        $user = \Illuminate\Support\Facades\Auth::user();       
        $_SESSION['role'] = $user['role'];
        
        $users = Users::all();
        

   
        return view('users', ['users' => $users]); 
        
    }
    
    
    # Редактируем информацию о пользователе
    public function update_post(Request $request){
        
                $id = $request->input('id');
                
                $password = $request->post('password');
       
                $users = Users::find($id);
                
                $errors = [];
                
                if(\Illuminate\Support\Facades\Hash::check($request->post('current_password'), $users->password)){
                    
                    $users->name = $request->post('name');
                    $users->email = $request->post('email');
                    $users->role = $request->post('role');
                    if(!empty($password)) {
                       $users->password = \Illuminate\Support\Facades\Hash::make($password);
                    }
                    $users->save();
                } else {
                $errors['current_password'][] = 'Пароль указан неверно';
            }

 

                # Редирект
                return response()->redirectToRoute('users');

                return view('users');
        
    }
    
    
    # Удаляем пользователя
    public function delete(Request $request){
        
                        $id = $request->input('id');
                        $users = Users::destroy($id);
        
                    # Редирект
                    return response()->redirectToRoute('users');

                    return view('users');
        
    }
    
    # Добавляем пользователя
    public function add_post(Request $request){
        
                    $password = $request->post('password');
        
                    $users = new Users();
                    
                    $users->name = $request->post('name');
                    $users->email = $request->post('email');
                    $users->role = $request->post('role');
                    $users->password = \Illuminate\Support\Facades\Hash::make($password);

  
                    $users->save();

                    # Редирект
                    return response()->redirectToRoute('users');

                    return view('users');
        
    }
    
}
