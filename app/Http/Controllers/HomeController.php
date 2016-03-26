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
     * Show the application index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = ProductType::get();
        return view('home', array('types' => $types));
    }

}
