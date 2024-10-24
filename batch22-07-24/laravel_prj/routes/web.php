<?php

use App\Http\Controllers\AdminController;
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

Route::prefix("admin")->controller(AdminController::class)->group(function () {


    include_once __DIR__ . "/admin.php";

    // Route::post("/dashboard/submit/delete/", "destroy2")->name("dashboard.delete.post2");

    // auth Route

    Route::get("register", "signup")->name("register.get");
    Route::post("register/submit", "signup_submit")->name("register.post");


    // login
    Route::get("login", "login")->name("login.get");
    Route::post("login/submit", "login_submit")->name("login.post");

    Route::get("logout", "logouts")->name("logout.admin.get");
});



