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


Auth::routes();
Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'login']);
Route::get('/register', ['uses' => 'AuthController@register', 'as' => 'register']);
Route::get('/forgot-password', ['uses' => 'AuthController@forgotPassword', 'as' => 'forgotpassword']);
Route::post('/postLogIn', ['uses' => 'AuthController@postLogIn', 'as' => 'postLogin']);
Route::post('/postRegister', ['uses' => 'AuthController@postRegister', 'as' => 'postRegister']);
Route::get('/', function () {
	if(Auth::check()){
    return redirect('/dashboard');
}else{
	return redirect('/login');
}
});

Route::middleware(['auth'])->group(function(){
Route::get('/products', ['uses' => 'ProductController@index', 'as' => 'products']);
Route::post('products/create', ['uses' => 'ProductController@create', 'as' => 'createProduct']);
Route::get('products/delete/{id}', ['uses' => 'ProductController@destroy', 'as' => 'deleteProduct']);
Route::post('/products/update/{id}', ['uses' => 'ProductController@update', 'as' =>'updateProduct']);
Route::post('/products/', ['uses' => 'ProductController@search', 'as'=> 'searchProduct']);
Route::get('/recipe', ['uses' =>'RecipeController@index', 'as'=> 'viewRecipe']);
Route::get('/dashboard', ['uses' => 'DashboardController@index', 'as' => 'index']);
Route::get('/logout', ['uses' => 'DashboardController@postLogOut', 'as' => 'logout']);
Route::post('/create', ['uses' => 'DashboardController@create', 'as' => 'create']);
Route::get('/{id}',['uses' => 'DashboardController@view', 'as' => 'view']);
Route::get('/delete/{id}', ['uses' => 'DashboardController@destroy', 'as'=> 'delete']);
Route::post('/update/{id}', ['uses' => 'DashboardController@update', 'as' => 'postSaveUpdate']);
Route::post('/myaccount/update/{id}', ['uses' => 'Dashboardcontroller@postUpdateMyAccount', 'as' => 'accountUpdate']);
});
