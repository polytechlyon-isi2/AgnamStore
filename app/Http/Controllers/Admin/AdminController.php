<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\UserUpdateTrait;
use App\User;
use Illuminate\Http\Request;
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

    public function profileAction($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return view('admin.user.profile', ['user' => $user, 'settingsMenu' => 1]);
    }

    public function updateProfileAction(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return $this->updateProfile($request,$user);
    }

    public function passwordAction($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return view('admin.user.password', ['user' => $user, 'settingsMenu' => 2]);
    }

    public function updatePasswordAction(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return $this->updatePassword($request,$user);

    }

    public function roleAction($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return view('admin.user.role', ['user' => $user, 'settingsMenu' => 3]);
    }

    public function updateRoleAction(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return $this->updateRole($request,$user);
    }

    public function deleteAction($id)
    {
        $user = User::find(1);
        if(!$user){
            return redirect()->route('admin.user');
        }
        $this->delete($user);
        return redirect()->route('admin.user');
    }
    //TODO Gestion ajout suppression et modification Product
    //TODO Gestion ajout suppression et modification User
}
