<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',function(){
        return view('welcome');
});

Auth::routes();

Route::get('/home', [ContactController::class,'index'])->name('home');

Route::match(['get','post'],'/update-profile', [HomeController::class,'update_profile'])->name('profile.update');

Route::group(['prefix'=>'contact', 'as'=>'contact.'],function(){
    Route::any('add',[ContactController::class,'add'])->name('add');
    Route::match(['get','post'],'/edit/{id}', [ContactController::class,'edit'])->name('edit');
    Route::get('/delete/{id}', [ContactController::class,'delete'])->name('delete');
    Route::get('phone/delete/{id}', [ContactController::class,'phoneDelete'])->name('phone.delete');
    Route::get('email/delete/{id}', [ContactController::class,'emailDelete'])->name('email.delete');
    Route::get('favorites', [ContactController::class,'favorites'])->name('favorites');
    Route::get('search', [ContactController::class,'search'])->name('search');
    Route::post('/change-favorite-status', [ContactController::class,'makeFavorite'])->name('makeFavorite'); 

});
