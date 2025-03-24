<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

Route::get('register',[RegisterController::class, 'index'])->name('register');
Route::post('register',[RegisterController::class,'store'])->name('register.store');
Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'proses'])->name('login.proses');
Route::get('keluar',[LoginController::class,'keluar'])->name('login.keluar');

Route::get('/',function(){
    return view('home.index');
})->middleware('auth')->name('home');
Route::get('users',function(){
    return view('users.index');
})->middleware('auth')->name('users');
Route::get('jenis-kendaraan',function(){
    return view('jenis-kendaraan.index');
})->middleware('auth')->name('jenis-kendaraan');
Route::get('kendaraan',function(){
    return view('kendaraan.index');
})->middleware('auth')->name('kendaraan');

Route::get('peminjaman',function(){
    return view('peminjaman.index');
})->middleware('auth')->name('peminjaman');
Route::get('pengembalian',function(){
    return view('pengembalian.index');
})->middleware('auth')->name('pengembalian');








