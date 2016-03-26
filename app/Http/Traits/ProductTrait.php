<?php

namespace App\Http\Traits;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Product;


/**
 * Created by PhpStorm.
 * User: gorya
 * Date: 15/03/2016
 * Time: 15:33
 */
trait ProductTrait
{
    private function saveProduct(Request $request,Product $product){
        $validator = Product::validate($request->all());
        if($validator->fails()){
            return redirect(route(Route::currentRouteName()))->withErrors($validator->errors());
        } else {
            if (!is_null($product->id)) {
                $product->update(
                    $request->all()
                );
                Session::flash('success', "Le produit a bien été mis à jour.");
            } else {
                $product->fill($request->all());
                $product->save();
                Session::flash('success', "Le produit a bien été crée.");
            }
        }
        if($param = Route::current()->getParameter('id')){
            return redirect()->route(Route::currentRouteName(),$param);
        }
        return redirect()->route(Route::currentRouteName());
    }

    private function deleteProduct(Product $product){
        $product->delete();
    }
}