<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Order;
use App\Product;
class userController extends Controller
{//display all user in admin page
    function getAllUser(){
        $allUsers = DB::table('users')->get();
        return view('allusers',compact('allUsers'));

    }
     //delete User by admin 
     function deleteUser($id){
        DB::table('users')->where('id',$id)->delete();
        return redirect('allusers');
    }
    //display products in user page
    function Allproduct(){
        $AllProducts = DB::table('products')->get();
        return view('userHome' , compact('AllProducts'));
        }
/// save order in database

       public static $userID;
       public static $price;
       public static $totalPrice;
       public static $product_name;
        function makeOrder(){
            $order = new Order();
            $totalPrice=0;
            $order->user_id = $userID;
            $order->total_price = $price;
            $totalPrice += $productPrice;
            $order->total_price += $totalPrice;
            $order->save();

        }
    function Buy($id){
        //gwt package in laravel to work with angular
        //laravel media to work with image as api
        $order = new Order();
        // $totalPrice=0;
        // $order->user_id = $userID;
        // $order->total_price = $price;
        // $totalPrice += $productPrice;
        // $order->total_price += $totalPrice;
        $order->user_id = Auth::user()->id;
        $order->total_price =  DB::table('products')->where('id',$id)->value('price');
        //$product_name =  DB::table('products')->where('id',$id)->value('product_Name');
        $order->save();
        return redirect('userHome');
    }
    function card(){
        return view('card',compact('price','product_name'));
    }
////////////////////////////seller home
    public function product(){
   
        $categories=DB::table('categories')->get();
        return view('sellerProduct',compact('categories'));
    }
    
    public function showUserProducts(){
        $user=Auth::User();
        $categories=DB::table('categories')->get();
        $userID=$user->id;
        $UserProducts=Product::where('user_id',$userID)->get();
        return view('sellerHome',compact('UserProducts','categories'));
     }

}
