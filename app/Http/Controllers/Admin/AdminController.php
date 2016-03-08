<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function indexAction()
    {
        return view('admin.index');
    }

    public function userAction()
    {
        $users = User::get();
        return view('admin.users',compact('users'));
    }
    //TODO Gestion ajout suppression et modification Product
    //TODO Gestion ajout suppression et modification User
}
