<?php

namespace App;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['price', 'name', 'year', 'author', 'description', 'image', 'product_type_id'];

    public function type()
    {
        return $this->belongsTo('App\\ProductType');
    }

    public function validate(array $data){
        return Validator::make($data,[
            'name'              => 'required|max:255',
            'price'             => 'required',
            'year'              => 'required',
            'author'            => 'required|max:255',
            'image'             => 'required|max:255',
            'description'       => 'required',
            'product_type_id'   => 'required'

        ]);
    }
}
