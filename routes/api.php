<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RolesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('category')->group(function() {
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{id}', [CategoryController::class, 'show']);
    Route::post('categories', [CategoryController::class, 'store'])->middleware('checkAdminRole');;
    Route::put('categories/{id}', [CategoryController::class, 'update'])->middleware('checkAdminRole');;
    Route::delete('categories/{id}', [CategoryController::class, 'destroy'])->middleware('checkAdminRole');;
});

Route::prefix('client')->group(function() {
    Route::get('clients', [ClientController::class, 'index']);
    Route::get('clients/{id}', [ClientController::class, 'show']);
    Route::post('clients', [ClientController::class, 'store'])->middleware('checkAdminRole');;
    Route::put('clients/{id}', [ClientController::class, 'update'])->middleware('checkAdminRole');;
    Route::delete('clients/{id}', [ClientController::class, 'destroy'])->middleware('checkAdminRole');;
});

Route::prefix('order')->group(function() {
    Route::get('orders', [OrderController::class, 'index']);
    Route::get('orders/{id}', [OrderController::class, 'show']);
    Route::post('orders', [OrderController::class, 'store'])->middleware('checkAdminRole');;
    Route::put('orders/{id}', [OrderController::class, 'update'])->middleware('checkAdminRole');;
    Route::delete('orders/{id}', [OrderController::class, 'destroy'])->middleware('checkAdminRole');;
});

Route::prefix('product')->group(function() {
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('products', [ProductController::class, 'store'])->middleware('checkAdminRole');;
    Route::put('products/{id}', [ProductController::class, 'update'])->middleware('checkAdminRole');;
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->middleware('checkAdminRole');;
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});

Route::post('register', [RegisterController::class, 'register']);

Route::post('register', [\App\Http\Controllers\RegisterController::class, 'register']);
Route::post('/roles', [RolesController::class, 'createRole'])->middleware(['jwt.auth']);;
Route::get('/roles', [RolesController::class, 'getRoles'])->middleware(['jwt.auth']);;
Route::get('/roles/{name}', [RolesController::class, 'getRolesByName'])->middleware(['jwt.auth']);;
Route::post('/permissions', [PermissionController::class, 'createPermission'])->middleware(['jwt.auth']);;
Route::get('/permissions', [PermissionController::class, 'index'])->middleware(['jwt.auth']);;
Route::get('/permissions/{name}', [PermissionController::class, 'findPermissionByName'])->middleware(['jwt.auth']);;

