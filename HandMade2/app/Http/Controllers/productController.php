<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
use DB;
class productController extends Controller
{
   function productPage(){
    $allProducts = DB::table('products')->get();
    return view('allProducts' , compact('allProducts'));
    }
//seller Home
    public function test(Request $request){
        $allCategory = DB::table('categories')->get();
        return view('sellerHome' , compact('allCategory'));
    }
    ///////////////Add product By admin
    function getcat(){
        $allCategory = DB::table('categories')->get();
         return view('addPRoduct' , compact('allCategory'));
    }

    function insertProduct(Request $request){
        $this->validate($request,[
            'product_Name' => 'required|string|max:255|unique:products',
            'details' => 'required|string',
            'price' => 'required|max:10',
           
        ]);
        $catName = $request->input('catName');
        $catID = DB::table('categories')->where('cat_name',$catName)->value('id');
        return $catID;
        $allCategory = DB::table('categories')->get();
        $products=new Product();
        $products->cat_id = $catID;
        //return $catID;
        $products->user_id = Auth::user()->id;
        $products->product_Name = $request->input('product_Name');
        $products->details = $request->input('details');
        $products->price = $request->input('price');
        if($request ->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload/products', $fileName);
            $products->img = $fileName;
            }
        else 
        {
        return $request;
        $products->img= '';
        }
        $products->save();
        return redirect('myProducts');
        
    }
    function create(Request $request){
        $this->validate($request,[
            'product_Name' => 'required|string|max:255|unique:products',
            'details' => 'required|string',
            'price' => 'required',
           
        ]);
        $catName = $request->input('catName');
        //return $catName;
        $catID = DB::table('categories')->where('cat_name',$catName)->value('id');
        $allCategory = DB::table('categories')->get();
        $products=new Product();
        $products->cat_id = $catID;
        $products->user_id = Auth::user()->id;
        $products->product_Name = $request->input('product_Name');
        $products->details = $request->input('details');
        $products->price = $request->input('price');
        if($request ->hasFile('img')){
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload/products', $fileName);
            $products->img = $fileName;
            }
        else 
        {
        return $request;
        $products->img= '';
        }
        $products->save();
        return view('sellerHome' , compact('allCategory'));
        
    }
     //delete Product
     function deleteProduct($id){
        DB::table('products')->where('id',$id)->delete();
        return redirect('allProducts');
    }
    /// product of specify  seller
    function sellerproduct(){
        
        $user=Auth::User();
        $categories=DB::table('categories')->get();
        $userID=$user->id;
        $UserProducts=Product::where('user_id',$userID)->get();
        return view('sellerProducts',compact('UserProducts','categories'));
    }
}
