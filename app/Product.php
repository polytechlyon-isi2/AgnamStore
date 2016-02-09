<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['price', 'name', 'year', 'author', 'description', 'image', 'typeId'];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }
}
