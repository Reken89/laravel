<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsSaveRequest;
use App\Http\Requests\LessonSaveRequest;



class ProfileController extends Controller
{
    public function show(Request $request){
        
        $user = \Illuminate\Support\Facades\Auth::user();
        
        return view('update', ['user' => $user]);
    }
    
    
    public function remaster(LessonSaveRequest $request){
        
        $user = \Auth::user();
        
                $errors = [];

        if($request->isMethod('post')) {
            $password = $request->post('password');

            if(\Illuminate\Support\Facades\Hash::check($request->post('current_password'), $user->password)){
                
                    $user->name = $request->post('name');
                    $user->email = $request->post('email');
                    if(!empty($password)) {
                        $user->password = \Illuminate\Support\Facades\Hash::make($password);
                    }
                    $user->save();
                
           } else {
                $errors['current_password'][] = 'Пароль указан неверно';
            }

            return redirect()->back()
                ->withErrors($errors);
        }
        return view('admin.profile.update', ['user' => $user]);
        
    }
    
}
