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
use App\Http\Traits\UserTrait;


/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    // Some method to update user
    use UserTrait;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {

    }

    /**
     * Show the form to update profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileAction()
    {
        $user = Auth::user();
        return view('user.profile', ['user' => $user, 'settingsMenu' => 1]);
    }

    /**
     * update profile and redirect to the form.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfileAction(Request $request)
    {
        $user = Auth::user();
        return $this->updateProfile($request,$user);
    }



    /**
     * Show the form to update password.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordAction(Request $request)
    {
        $user = Auth::user();
        return view('user.password', ['user' => $user, 'settingsMenu' => 2]);
    }

    /**
     * Update password and redirect to the form.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePasswordAction(Request $request)
    {
        $user = Auth::user();
        return $this->updatePassword($request,$user);

    }


}
