<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;

// User Controller
Route::get('/user_details/username={uname}', [UserController::class, 'userDetails']);
Route::post("/createuser",[UserController::class,'createUser']);

// Expense Controller
Route::post("/addexpense",[ExpenseController::class,'addExpense']);
Route::get('/user_expense/username={uname}', [ExpenseController::class, 'userExpense']);
Route::get('/overall_expense/username={uname}', [ExpenseController::class, 'overallExpense']);
Route::get('/download_balancesheet', [ExpenseController::class, 'downloadBalancesheet']);