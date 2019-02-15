<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/getCat','productController@index');
// to prevent enter userHome with out login
Route::group(['middleware'=>'islogin'],function(){
    Route::group(['middleware'=>'seller'],function(){
    //edite page
    Route::get('/admin/{id}/edit','categoryController@editForm');
    Route::post('/admin/{id}/update','categoryController@editCategory');
    //admin page
    Route::get('/admin','categoryController@getCategorytoAdmin');
    //delete category by admin
    Route::get('/delete/{id}','categoryController@deleteCategory');
    //add category by admin
    Route::get('/catForm','categoryController@catForm');
    Route::post('/admin','categoryController@addCat'); 
    //middleware to prevent other user to access this page
    Route::get('/ProductForm','productController@getcat');
    Route::post('/allProducts','productController@insertProduct');
    Route::get('/allProducts','productController@productPage');
    Route::get('/deleteProduct/{id}','productController@deleteProduct');
    Route::get('allusers','userController@getAllUser');
    Route::get('/deleteUser/{id}','userController@deleteUser');

    });
    // middleware for user
    Route::group(['middleware'=>'permission'],function(){
    Route::get('userHome','userController@Allproduct');
    Route::get('/buy/{id}','userController@Buy');
    Route::get('/card','userController@card');
    });
    ///seller 
    Route::group(['middleware'=>'user_Type'],function(){
    Route::post('/allProducts','productController@insertProduct');
    Route::get('/ProductForm','productController@getcat');
    Route::get('home','productController@test');
    Route::get('/myProducts','productController@sellerproduct');
   // Route::post('/add','cartController@add');
    });
    
});
//Route::get('/home', 'HomeController@index')->name('home');