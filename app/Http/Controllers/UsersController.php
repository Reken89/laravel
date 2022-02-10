<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UsersController extends Controller
{
    public function add(){
        
        $user = \Illuminate\Support\Facades\Auth::user();       
        $_SESSION['role'] = $user['role'];
        
        $users = Users::all();
        

   
        return view('users', ['users' => $users]); 
        
    }
    
    
    public function update_post(Request $request){
        
                $id = $request->input('id');
                
                $password = $request->post('password');
       
                $users = Users::find($id);
                
                $errors = [];
                
                if(\Illuminate\Support\Facades\Hash::check($request->post('current_password'), $users->password)){
                    
                    $users->name = $request->post('name');
                    $users->email = $request->post('email');
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
    
    
    public function delete(Request $request){
        
                        $id = $request->input('id');
                        $users = Users::destroy($id);
        
                    # Редирект
                    return response()->redirectToRoute('users');

                    return view('users');
        
    }
}
