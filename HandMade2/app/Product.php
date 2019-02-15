<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $fillable = [
        'product_Name','details','price', 'img',
    ];
    public $table = "products";
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
