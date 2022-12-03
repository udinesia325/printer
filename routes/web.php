<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PrinterController;
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

Route::get("/logout", [AuthController::class, "logout"])->name("logout");
Route::middleware("auth")->group(function () {

    Route::get('/', [PrinterController::class, 'index'])->name("home");
    Route::post('/', [PrinterController::class, 'create'])->name("printer.create");
    Route::delete("/{printer}", [PrinterController::class, "delete"]);


    Route::get("/edit/{printer}", [PrinterController::class, "edit"])->name("printer.edit");
    Route::post("/update/{printer}", [PrinterController::class, "update"])->name("printer.update");
});
Route::get("/login", [AuthController::class, "index"])->name("login");
Route::post("/login", [AuthController::class, "login"])
    ->name("login.process");
