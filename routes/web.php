<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@index');
Route::get('/client', 'ClientController@indexAjax');
Route::prefix('api')->group(function () {
    Route::get('/products', [ProductController::class, 'list']);
    Route::get('/products/my', [ProductController::class, 'my_products']);
    Route::post('/product/store', [ProductController::class, 'store']);
    Route::get('/product/create', [ProductController::class, 'create']);
    Route::get('/product/{id}/show', [ProductController::class, 'show']);
    Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
    Route::post('/product/{id}/update', [ProductController::class, 'update']);
    Route::delete('/product/{id}/delete', [ProductController::class, 'delete']);
    Route::get('/admin/users', [AdminController::class, 'users']);
    Route::get('/admin/categories', [CategoryController::class, 'categories']);
    Route::get('/user/{id}/edit', [AdminController::class, 'edit']);
    Route::post('/user/{id}/update', [AdminController::class, 'update']);
    Route::get('/category/create', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::delete('/category/{id}/delete', [CategoryController::class, 'delete']);
    Route::delete('/user/{id}/delete', [AdminController::class, 'delete']);
});

Route::get('/api/images/{imageName}', function ($imageName) {
    // Здесь вы должны вернуть содержимое изображения по имени
    $imagePath = public_path("images/{$imageName}");

    if (file_exists($imagePath)) {
        $file = file_get_contents($imagePath);
        return response($file)->header('Content-Type', 'image/jpeg'); // Измените тип содержимого на соответствующий тип вашего изображения
    } else {
        return response('Image not found', 404);
    }
});

Route::resource('categories', CategoryController::class);
//Route::resource('products', ProductController::class);
Route::resource('clients', ClientController::class);
Route::resource('orders', OrderController::class);
