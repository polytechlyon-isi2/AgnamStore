<?php

namespace App\Http\Controllers;

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
trait UserUpdateTrait
{
    protected function updatePassword(Request $request, $user){
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
        return redirect(route(Route::currentRouteName())); // He don't need to edit again password
    }

    protected function updateProfil(Request $request, $user){
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
        return redirect()->route(Route::currentRouteName());
    }
}