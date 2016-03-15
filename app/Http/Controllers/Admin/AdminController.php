<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserUpdateTrait;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use UserUpdateTrait;

    public function indexAction()
    {
        return view('admin.index');
    }

    public function userAction()
    {
        $users = User::get();
        return view('admin.users',compact('users'));
    }

    public function profileAction(Request $request)
    {
        $user = Auth::user();
        return view('admin.user.profile', ['user' => $user, 'settingsMenu' => 1]);
    }

    public function updateProfileAction(Request $request)
    {
        $user = Auth::user();
        return $this->updateProfil($request,$user);
    }

    public function passwordAction(Request $request)
    {
        $user = Auth::user();
        return view('admin.user.password', ['user' => $user, 'settingsMenu' => 2]);
    }

    public function updatePasswordAction(Request $request)
    {
        $user = Auth::user();
        return $this->updatePassword($request,$user);

    }
    //TODO Gestion ajout suppression et modification Product
    //TODO Gestion ajout suppression et modification User
}
