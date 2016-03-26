<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ProductType;
use App\Product;

class ProductController extends Controller
{
    
    /**
     * Show the products of a selected type.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProductsByType($id)
    {
        $type = ProductType::with('Products')->find($id);
        return view('showProductsByType', array('type' => $type));
    }
    
    /**
     * Show the details of a selected product.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProductDetails($id)
    {
        $product = Product::find($id);
        return view('product.show', array('product' => $product));
    }
}
