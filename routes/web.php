<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function(){
    Route::get('/list-expense',[ExpenseController::class,'showListExpense'])->name('show-list-expense');
    Route::get('/{id}/delete',[ExpenseController::class,'delete'])->name('delete-expense');
    Route::get('/create',[ExpenseController::class,'showFormCreate'])->name('create-expense');
    Route::post('/add',[ExpenseController::class,'add'])->name('add-expense');
    Route::get('/{id}/edit',[ExpenseController::class,'showFormEdit'])->name('edit-expense');
    Route::put('/{id}/update',[ExpenseController::class,'update'])->name('update-expense');
})->name('admin');
