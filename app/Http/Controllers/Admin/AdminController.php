<?php

namespace App\Http\Controllers\Admin;

use App\Http\Traits\ProductTrait;
use App\Http\Traits\UserTrait;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    use UserTrait,ProductTrait;

    /**
     * Show index of administration dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAction()
    {
        return view('admin.index');
    }

    /**
     * Show all users for administrate them.
     *
     * @return \Illuminate\Http\Response
     */
    public function userAction()
    {
        $users = User::get();
        return view('admin.users',compact('users'));
    }

    /**
     * Show the form to update profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profileAction($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return view('admin.user.profile', ['user' => $user, 'settingsMenu' => 1]);
    }

    /**
     * update profile and redirect to the form.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfileAction(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return $this->updateProfile($request,$user);
    }


    /**
     * Show the form to update password.
     *
     * @return \Illuminate\Http\Response
     */
    public function passwordAction($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return view('admin.user.password', ['user' => $user, 'settingsMenu' => 2]);
    }

    /**
     * Update password and redirect to the form.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatePasswordAction(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return $this->updatePassword($request,$user);

    }

    /**
     * Show the form to update role.
     *
     * @return \Illuminate\Http\Response
     */
    public function roleAction($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return view('admin.user.role', ['user' => $user, 'settingsMenu' => 3]);
    }

    /**
     * Update role and redirect to the form.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateRoleAction(Request $request,$id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        return $this->updateRole($request,$user);
    }

    /**
     * Show the form to update role.
     *
     * @return \Illuminate\Http\Response
     */
    public function addAction()
    {
        $user = new User();
        return view('admin.user.add', ['user' => $user]);
    }

    /**
     * Update role and redirect to the form.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCheckAction(Request $request)
    {
        return $this->addUser($request);
    }

    /**
     * Delete user and redirect to user list (show all users).
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteAction($id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user');
        }
        $this->deleteUser($user);
        return redirect()->route('admin.user');
    }



    /**
     * Show all products for administrate them.
     *
     * @return \Illuminate\Http\Response
     */
    public function productAction()
    {
        $products = Product::with('type')->get();
        return view('admin.products',compact('products'));
    }

    /**
     * Show the form to add a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function productAddAction()
    {
        $product = new Product();
        return view('admin.product.form',compact('product'));
    }

    /**
     * add a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkProductAddAction(Request $request)
    {
        $product = new Product();
        return $this->saveProduct($request,$product);
    }

    /**
     * Show the form to edit a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function productUpdateAction($id)
    {
        $product = Product::find($id);

        if(!$product){
            return redirect()->route('admin.product');
        }
        return view('admin.product.form',compact('product'));
    }

    /**
     * Edit a product.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkProductUpdateAction(Request $request,$id)
    {
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('admin.product');
        }
        return $this->saveProduct($request,$product);
    }

    /**
     * Delete product and redirect to user list (show all users).
     *
     * @return \Illuminate\Http\Response
     */
    public function productDeleteAction($id)
    {
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('admin.product');
        }
        $this->deleteProduct($product);
        return redirect()->route('admin.product');
    }
}
