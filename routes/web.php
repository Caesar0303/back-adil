<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

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
//Route::get('/product/create', function ($task) {
//    return view('views.ProductCreate', ['task' => $task]);
//});

Route::resource('categories', CategoryController::class);
//Route::resource('products', ProductController::class);
Route::resource('clients', ClientController::class);
Route::resource('orders', OrderController::class);
