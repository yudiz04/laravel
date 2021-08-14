<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthCustController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\TransactionController;
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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/category', [CategoryController::class, 'index']);
// Route::post('/category', [CategoryController::class, 'store']);
// Route::get('/category/create', [CategoryController::class, 'create']);
// //Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
// Route::get('/category/{category}/edit', [CategoryController::class, 'edit']);
// //Route::patch('/category/{id}/', [CategoryController::class, 'update']);
// Route::patch('/category/{category}', [CategoryController::class, 'update']);
// Route::delete('/category/{category}', [CategoryController::class, 'destroy']);
Route::get('/', [LandingController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'loginStore']);
Route::get('/loginCust', [AuthCustController::class, 'index'])->name('loginCust');
Route::post('/loginCust', [AuthCustController::class, 'loginCust']);
Route::get('/logoutCust', [AuthCustController::class, 'logoutCust']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registrasi'])->name('register');
Route::post('/register', [AuthController::class, 'registrasiStore']);
Route::post('/registerCust', [AuthCustController::class, 'registrasiCust']);

Route::get('detail/{product}', [LandingController::class, 'detail']);

Route::group(['middleware' => ['auth', 'super']], function(){

Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
// Route::resource('costumer', CostumerController::class);
Route::resource('state', StateController::class);
Route::resource('city', CityController::class);
Route::resource('bank', BankController::class);
Route::resource('courier', CourierController::class);
Route::get('/productPhoto', [ProductController::class, 'createPhoto']);
Route::post('/productPhoto', [ProductController::class, 'storePhoto']);
Route::get('/home', [HomeController::class, 'index']);


});

Route::group(['middleware' => ['authcustomer','customer']], function(){
    Route::resource('cart', CartController::class);
    Route::resource('transaction', TransactionController::class);
    
    
    Route::get('list/{product}', [LandingController::class, 'list']);
});

Route::get('/sukses', [TransactionController::class,'sukses']);