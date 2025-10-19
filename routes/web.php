<?php

use App\Http\Controllers\DemoEloquentController;
use App\Http\Controllers\OrmController;
use App\Http\Controllers\userAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/',[userAccountController::class,'index'])->name('home');
Route::get('/create_user',[userAccountController::class,'create'])->name('add');
Route::post('/store',[userAccountController::class,'store'])->name('store');
// Edit
Route::get('/{id}/edit',[userAccountController::class,'edit'])->name('edit');
//updated
Route::post('/{id}/update',[userAccountController::class,'update'])->name('update');
//delete
Route::post('/{id}/delete',[userAccountController::class,'destroy'])->name('delete');


//ORM EXAMPLE
Route::get('/orm',[OrmController::class,'ormExample'])->name('ormExample');
Route::get('/oneToOne',[DemoEloquentController::class,'oneToOne']);  
Route::get('/hasMany',[DemoEloquentController::class,'hasMany']);  //transaction
