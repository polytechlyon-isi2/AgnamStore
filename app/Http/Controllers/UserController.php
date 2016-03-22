<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 11/02/2016
 * Time: 19:00
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    use UserUpdateTrait;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    public function profileAction()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user, 'settingsMenu' => 1]);
    }

    public function updateProfileAction(Request $request)
    {
        $user = Auth::user();
        return $this->updateProfile($request,$user);
    }



    public function passwordAction(Request $request)
    {
        $user = Auth::user();
        return view('user.password', ['user' => $user, 'settingsMenu' => 2]);
    }

    public function updatePasswordAction(Request $request)
    {
        $user = Auth::user();
        return $this->updatePassword($request,$user);

    }


}
