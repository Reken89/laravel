<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class VkController extends Controller
{
    public function loginvk(){
        
                if(\Illuminate\Support\Facades\Auth::id()) {
            return redirect()->route('home');
        }
        
        return \Laravel\Socialite\Facades\Socialite::with('vkontakte')->redirect();
        
    }
    
        public function responsevk(){
        
        $user = \Laravel\Socialite\Facades\Socialite::driver('vkontakte')->user();
        
            $ownUser = Users::query()
            ->where('id_in_soc', $user->getId())
            ->where('type_auth', 'vk')
            ->first();

        if(is_null($ownUser)) {
            $ownUser = new Users();
            
            $ownUser->name = $user->getName();
            $ownUser->email = $user->getEmail();
            $ownUser->password = \Illuminate\Support\Facades\Hash::make('qwerty');
            $ownUser->role = 'admin';
            $ownUser->id_in_soc = $user->getId();
            $ownUser->type_auth = 'vk';
            #$ownUser->avatar = $user->getAvatar();
            $ownUser->avatar = 'NULL';
            $ownUser->save();
            /*
            $ownUser->fill([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => \Illuminate\Support\Facades\Hash::make('qwerty'),
                'role' => 'admin',
                'id_in_soc' => $user->getId(),
                'type_auth' => 'vk',
                'avatar' => $user->getAvatar(),
            ])->save();
             
             */
        }


        \Illuminate\Support\Facades\Auth::login($ownUser);
        return redirect()->route('users');
        
        
        }
}
