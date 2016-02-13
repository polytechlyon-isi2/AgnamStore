<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 11/02/2016
 * Time: 19:00
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user, 'settingsMenu' => 1]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'name' => 'required|max:255|unique:users,name,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);
        if($validator->fails()){
            return redirect(route('user.profile'))->withErrors($validator->errors());
        } else{
            $user->update($request->all());
            Session::flash('success',"Le profil utilisateur a bien été mis à jour.");
        }
        return redirect(route('user.profile'));
    }

    public function password(Request $request)
    {
        $user = Auth::user();
        return view('user.password', ['user' => $user, 'settingsMenu' => 2]);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make($request->all(),[
            'password' => 'required|confirmed|min:6',
        ]);
        if($validator->fails()){
            return redirect(route('user.password'))->withErrors($validator->errors());
        } else{
            $user->update([
                'password' => bcrypt($request->get('password'))
            ]);
            Session::flash('success',"Le mot de passe a bien été mis à jour.");
        }
        return redirect(route('user.profile')); // He don't need to edit again password
    }
}
