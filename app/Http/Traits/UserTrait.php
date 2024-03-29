<?php

namespace App\Http\Traits;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

/**
 * Created by PhpStorm.
 * User: gorya
 * Date: 15/03/2016
 * Time: 15:33
 */
trait UserTrait
{
    private function updatePassword(Request $request,User $user){
        $validator = Validator::make($request->all(),[
            'password' => 'required|confirmed|min:6',
        ]);
        if($validator->fails()){
            return redirect(route(Route::currentRouteName()))->withErrors($validator->errors());
        } else{
            $user->update([
                'password' => bcrypt($request->get('password'))
            ]);
            Session::flash('success',"Le mot de passe a bien été mis à jour.");
        }
        if($param = Route::current()->getParameter('id')){
            return redirect()->route(Route::currentRouteName(),$param);
        }
        return redirect()->route(Route::currentRouteName());    }

    private function updateProfile(Request $request,User $user){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255|unique:users,name,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);
        if($validator->fails()){
            return redirect(route(Route::currentRouteName()))->withErrors($validator->errors());
        } else{
            $user->update($request->all());
            Session::flash('success',"Le profil utilisateur a bien été mis à jour.");
        }

        if($param = Route::current()->getParameter('id')){
            return redirect()->route(Route::currentRouteName(),$param);
        }
        return redirect()->route(Route::currentRouteName());
    }

    private function updateRole(Request $request,User $user){
        $validator = Validator::make($request->all(),[
            'role' => 'required',
        ]);
        if($validator->fails()){
            return redirect(route(Route::currentRouteName()))->withErrors($validator->errors());
        } else{
            $user->update($request->all());
            Session::flash('success',"Le profil utilisateur a bien été mis à jour.");
        }
        if($param = Route::current()->getParameter('id')){
            return redirect()->route(Route::currentRouteName(),$param);
        }
        return redirect()->route(Route::currentRouteName());
    }

    private function addUser(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
        ]);
        if($validator->fails()){
            return redirect(route(Route::currentRouteName()))->withErrors($validator->errors());
        } else{
            User::create([
                'email' => $request->get('email'),
                'name' => $request->get('name'),
                'password' => bcrypt($request->get('password')),
                'role' => $request->get('role')
            ]);
            Session::flash('success',"L'utilisateur a bien été crée.");
        }
        return redirect()->route(Route::currentRouteName());
    }

    private function deleteUser(User $user){
        $user->delete();
    }
}