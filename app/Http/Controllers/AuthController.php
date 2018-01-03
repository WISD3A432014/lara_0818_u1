<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        if(!User::where('github_id',$user->id)->first()){
            $userModel = new User;
            $userModel->github_id = $user->id;
            $userModel->email = $user->email;
            $userModel->name = $user->name;
            $userModel->avatar = $user->avatar;
            $userModel->save();
        }

        $userInstance = User::where('github_id',$user->id)->firstOrFail();
        Auth::login($userInstance);
        echo $user->name.'登錄成功!';
    }

}
