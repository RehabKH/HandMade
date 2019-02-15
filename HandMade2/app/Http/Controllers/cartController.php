<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
class cartController extends Controller
{
   public function add(Request $req){
    Cart::add(array(
        'id' => 456,
        'name' => 'Sample Item',
        'price' => 67.99,
        'quantity' => 4,
        'attributes' => array()
    ));
   }
}
