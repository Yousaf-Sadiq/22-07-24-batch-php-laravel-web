<?php
 Route::get('/dashboard', "index")->name("admin.dashboard");
 Route::post('/dashboard/submit', "store")->name("admin.dashboard.post");

 // update
 Route::get('/dashboard/update/{id}', "show")
     ->name("admin.dashboard.update")
     ->whereNumber("id");


 Route::post('/dashboard/update/submit', "update")->name("admin.dashboard.update.post");



 //  upload file

 Route::post("/uploads", "upload")->name("upload.admin");


 // delete route
 // Route::post("/dashboard/submit/delete/{id}", "destroy")->name("dashboard.delete.post");
 Route::post("/dashboard/submit/delete/", "destroy")->name("dashboard.delete.post");

?>
