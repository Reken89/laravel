<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\NewsSaveRequest;

class ProfileController extends Controller
{
    public function update(Request $request){
        
        
        return view('update');
    }
}
