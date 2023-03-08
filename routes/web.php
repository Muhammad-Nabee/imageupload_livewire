<?php
use App\Http\Controllers\Emploies;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('employ',[Emploies::class,'index'])->name('index');
Route::get('create',[Emploies::class,'create'])->name('create');
Route::post('store',[Emploies::class,'store'])->name('store');
Route::get('view/{id}',[Emploies::class,'view'])->name('employe.view');
Route::get('edit/{id}',[Emploies::class,'edit'])->name('employe.edit');
Route::post('update/{id}',[Emploies::class,'update'])->name('employe.update');
Route::get('delete/{id}',[Emploies::class,'delete'])->name('employe.delete');