<?php
/**
 * Created by PhpStorm.
 * User: gorya
 * Date: 22/03/2016
 * Time: 16:21
 */

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Controllers;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function showAction()
    {
        $cart = Auth::user()->getCart();
        return view('cart.show',compact('cart'));
    }

    public function addAction($id)
    {
        $product = Product::find($id);
        if($product){
            $cart = Cart::where([
                'user_id' =>  Auth::user()->id,
                'product_id' => $product->id])->get();

            if($cart->isEmpty()) {
                Cart::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $product->id,
                    'quantity' => 1
                ]);
                Session::flash('success', "Le produit a bien été ajouté au panier.");
            } else {
                $item =$cart->first();
                $item->where([
                    'user_id' =>  Auth::user()->id,
                    'product_id' => $product->id
                ])->update([
                    'quantity' => $item->quantity + 1
                ]);
            }

        } else {
            Session::flash('success', "Echec de l'ajout du produit au panier");
        }
        return redirect()->route('user.cart');
    }

    public function removeAction($id)
    {
        $product = Product::find($id);
        if($product){
            $cart = Cart::where([
                'user_id' =>  Auth::user()->id,
                'product_id' => $product->id])->get();

            if(!$cart->isEmpty()) {
                $item =$cart->first();
                $qte = $item->quantity - 1;
                if($qte < 1){
                    Cart::Where(['user_id'=>Auth::user()->id,'product_id'=>$id])->delete();
                } else {
                    $item->where([
                        'user_id' =>  Auth::user()->id,
                        'product_id' => $product->id
                    ])->update([
                        'quantity' => $qte
                    ]);

                }

            }

        } else {
            Session::flash('success', "Echec de l'ajout du produit au panier");
        }
        return redirect()->route('user.cart');
    }
    public function delAction($id)
    {
        $cart = Cart::Where(['User_id'=>Auth::user()->id,'product_id'=>$id])->delete();
        return redirect()->route('user.cart');
    }
}