<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeluarController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UserController;
use App\Models\barang_masuk;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\CssSelector\Node\FunctionNode;

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

Route::middleware('guest')->group(function(){
    Route::post('/login', [UserController::class, 'login']);
    
    Route::get('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', function () {
        return view('Auth.register');
    });
    Route::post('/register', [UserController::class, 'register']);
    

});
Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index']);

    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang', [BarangController::class, 'tambah']);
    Route::get('/barang/delete/{id_barang}', [BarangController::class, 'delete']);
    Route::get('/barang/edit/{id_barang}', [BarangController::class, 'edit']);
    Route::get('/barang/update/{id_barang}', [BarangController::class, 'update']);

    Route::get('/stok', [StockController::class, 'index']);
    Route::post('/stok', [BarangController::class, 'tambah']);
    Route::get('/stok/edit/{id_stock}', [StockController::class, 'edit']);
    Route::post('/stok/update/{id_stock}', [StockController::class, 'update']);
    Route::get('/stok/delete/{id_stock}', [StockController::class, 'delete']);

    Route::get('/view_masuk/{id}', [MasukController::class, 'index']);
    Route::post('/view_masuk/filter', [MasukController::class, 'filter']);
    Route::post('/masuk', [MasukController::class, 'tambah']);
    Route::get('/masuk/edit/{id_masuk}', [MasukController::class, 'edit']);
    Route::get('/masuk/update/{id_masuk}', [MasukController::class, 'update']);
    Route::get('/masuk/delete/{id_masuk}', [MasukController::class, 'delete']);
    Route::get('/view_masuk/scan/{kode}', [MasukController::class, 'scan']);

    
    
    Route::get('/view_keluar/{id}', [KeluarController::class, 'index']);
    Route::post('/view_keluar/filter', [KeluarController::class, 'filter']);
    Route::post('/keluar', [KeluarController::class, 'kurangi']); 
    Route::get('/keluar/edit/{id_keluar}', [KeluarController::class, 'edit']);
    Route::get('/keluar/update/{id_keluar}', [KeluarController::class, 'update']);
    Route::get('/keluar/delete/{id_keluar}', [KeluarController::class, 'keluar']); 
    Route::get('/view_keluar/scan/{kode}', [KeluarController::class, 'scan']);

    // Route::get('/kategori',[KategoriCont    roller::class, 'index']);    
    Route::post('/logout', [UserController::class, 'logout']);

    Route::get('/kategori', [KategoriController::class, 'index']);
    Route::post('/kategori', [KategoriController::class, 'tambah']);
    Route::get('kategori/edit/{id}', [KategoriController::class, 'edit']);
    Route::get('kategori/update/{id}', [KategoriController::class, 'update']);


    Route::get('/satuan', [SatuanController::class, 'index']);
    Route::post('/satuan', [SatuanController::class, 'tambah']);
    Route::get('/satuan/edit/{id}', [SatuanController::class, 'edit']);
    Route::get('/satuan/update/{id}', [SatuanController::class, 'update']);
    
    
    // Route::get('/kategori', function () {
    //     return view('table.kategori');
    // });
    
    
});







