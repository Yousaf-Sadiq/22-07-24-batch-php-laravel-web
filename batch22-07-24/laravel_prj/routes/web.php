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


    Route::get('/dashboard', "index")->name("admin.dashboard");
    Route::post('/dashboard/submit', "store")->name("admin.dashboard.post");

    // update
    Route::get('/dashboard/update/{id}', "show")
        ->name("admin.dashboard.update")
        ->whereNumber("id");


    Route::post('/dashboard/update/submit', "update")->name("admin.dashboard.update.post");



    //  upload file

    Route::post("/uploads", "upload")->name("upload.admin");
});

