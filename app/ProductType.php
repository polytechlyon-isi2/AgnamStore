<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['label'];

    public function products()
    {
        return $this->hasMany('App\\Product');
    }

    public function getFourLastProduct()
    {
        return Product::where(['product_type_id' => $this->id])->orderBy('created_at','desc')->take(4)->get();
    }
}
