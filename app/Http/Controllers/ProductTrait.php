<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Foundation\Auth\User;
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
trait ProductUpdateTrait
{
    private function saveProduct(Request $request,Product $product){
        $validator = Product::validate($request->all());
        if($validator->fails()){
            return redirect(route(Route::currentRouteName()))->withErrors($validator->errors());
        } else {
            if ($product->id) {
                $product->update([
                    $request->all()
                ]);
                Session::flash('success', "Le produit a bien été mis à jour.");
            } else {
                $product->fill($request->all());
                $product->save();
            }
        }
        if($param = Route::current()->getParameter('id')){
            return redirect()->route(Route::currentRouteName(),$param);
        }
        return redirect()->route(Route::currentRouteName());
    }

    private function delete(Product $product){
        $product->delete();
    }
}