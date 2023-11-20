<?php


use Illuminate\Support\Facades\Route;
use Mithuncdas\LaravelCRUD\Http\Controllers\CRUDController;

Route::get('/list',[CRUDController::class,'index'])->name('index');
Route::get('/create',[CRUDController::class,'create'])->name('create');
Route::post('/store',[CRUDController::class, 'store'])->name('store');
Route::get('/{id}/edit',[CRUDController::class,'edit'])->name('edit');
Route::post('/{id}/update',[CRUDController::class,'update'])->name('update');
Route::get('/{id}/show',[CRUDController::class,'show'])->name('show');
Route::get('/{id}/delete',[CRUDController::class,'destroy'])->name('destroy');