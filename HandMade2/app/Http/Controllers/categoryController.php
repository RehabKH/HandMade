<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;
use Storage;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    function getID($id){
        $allCategory = DB::table('categories')->where('id',$id)->get();
       return view('editForm' , compact('allCategory'));
    }
    //edite form 
    function editForm($id){
        $allCategory = DB::table('categories')->where('id',$id)->get();
       return view('editForm' , compact('allCategory'));
    }
    //edit category
    function editCategory($id,Request $request){
        $this->validate($request,[
            'cat_name' => 'required|string|max:255|unique:categories',
            'cat_img' => 'required',
           
        ]);
        $cat = Category::find($id);
        if($request ->hasFile('cat_img')){
            Storage::delete($cat->cat_img);
            $file = $request->file('cat_img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload/categories', $fileName);
            
            }
        else 
        {
        return $request;
        $cat->cat_img= '';
        }
        $cat->cat_img = $fileName;
        $cat->cat_name = $request->input('cat_name');
        $cat->save();   
        return redirect('admin');
    }
    //delete category
    function deleteCategory($id){
        DB::table('categories')->where('id',$id)->delete();
        return redirect('admin');
    }
    //insert form
    function catForm(){
        return view('addCat');
    }
    //inside admin page
    function getCategorytoAdmin(){
        $allCategory = DB::table('categories')->get();
       //$allCategory = Category::all();
        return view('admin' , compact('allCategory'));
    }
    
    //save category into database
    function addCat(Request $request){
        $this->validate($request,[
            'cat_name' => 'required|string|max:255|unique:categories',
            'cat_img' => 'required',
           
        ]);
        $cat=new Category();
        $cat->cat_name = $request->input('cat_name');
        if($request ->hasFile('cat_img')){
            $file = $request->file('cat_img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $file->move('upload/categories', $fileName);
            $cat->cat_img = $fileName;
            }
        else 
        {
        return $request;
        $cat->cat_img= '';
        }
        $cat->save();
        return redirect('admin');
    }
}
