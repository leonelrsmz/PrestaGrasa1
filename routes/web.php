<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[App\Http\Controllers\ContentController::class, 'getHome']);

Route::get('/login',[App\Http\Controllers\ConexionController::class, 'getLogin']);
Route::post('/login',[App\Http\Controllers\ConexionController::class, 'postLogin']);

Route::get('/register',[App\Http\Controllers\ConexionController::class, 'getRegister']);
Route::post('/register',[App\Http\Controllers\ConexionController::class, 'postRegister']);

Route::get('/logout',[App\Http\Controllers\ConexionController::class, 'getLogout']);
Route::get('/userToken',[App\Http\Controllers\Admin\UserController::class, 'getshowToken']);

//Rutas de administrador
Route::get('/admin',[App\Http\Controllers\Admin\DashboardController::class, 'getDashboard']);

Route::get('/admin/users',[App\Http\Controllers\Admin\UserController::class, 'getUsers']);

Route::get('/admin/user/{id}/edit',[App\Http\Controllers\Admin\UserController::class, 'getUserEdit']);
Route::post('/admin/user/{id}/edit',[App\Http\Controllers\Admin\UserController::class, 'postUserEdit']);
Route::get('/admin/user/{id}/delete',[App\Http\Controllers\Admin\UserController::class, 'getUserDelete']);

Route::get('/admin/products/{status}',[App\Http\Controllers\Admin\ProductController::class, 'getHome']);
Route::get('/admin/product/add',[App\Http\Controllers\Admin\ProductController::class, 'getProductAdd']);
Route::post('/admin/product/add',[App\Http\Controllers\Admin\ProductController::class, 'postProductAdd']);
Route::post('/admin/product/search',[App\Http\Controllers\Admin\ProductController::class, 'postProductSearch']);
Route::get('/admin/product/{id}/edit',[App\Http\Controllers\Admin\ProductController::class, 'getProductEdit']);
Route::post('/admin/product/{id}/edit',[App\Http\Controllers\Admin\ProductController::class, 'postProductEdit']);
Route::get('/admin/product/{id}/delete',[App\Http\Controllers\Admin\ProductController::class, 'getProductDelete']);

Route::get('/admin/categories/{module}',[App\Http\Controllers\Admin\CategoriesController::class, 'getHome']);
Route::post('/admin/category/add',[App\Http\Controllers\Admin\CategoriesController::class, 'postCategoryAdd']);
Route::get('/admin/category/{id}/edit',[App\Http\Controllers\Admin\CategoriesController::class, 'getCategoryEdit']);
Route::post('/admin/category/{id}/edit',[App\Http\Controllers\Admin\CategoriesController::class, 'postCategoryEdit']);
Route::get('/admin/category/{id}/delete',[App\Http\Controllers\Admin\CategoriesController::class, 'getCategoryDelete']);