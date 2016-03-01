<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use Mockery\Matcher\Type;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ProductType::with('Products')->get();
        return view('home', array('types' => $types));
    }

    //TODO Gestion de la mise à jour du profil
}
