<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\authcontroller;

// adelia@gmail.com pass 1234
Route::group(['middleware' => ['guest']], function(){
    Route::get("/", "PageController@login")-> name('login');
    Route::post("/login", "authcontroller@ceklogin");
});

Route::group(['middleware' => ['auth']], function()
{
Route::get("/user", "PageController@formedituser");
Route::post("updateuser", "PageController@updateuser");
Route::get("/logout", "authcontroller@ceklogout");
Route::get("/home", "PageController@home"); 
Route::get("/kelontong_549", "PageController@kelontong_549"); //auth adlh admin(yg sudah login), guest adlh user
Route::get("/kelontong_549/add-form", "PageController@formaddkelontong_549"); //mengambil data
Route::post("/save", "PageController@savekelontong_549"); //memasaukkan data
Route::get("/kelontong_549/edit-form/{id}", "PageController@formeditkelontong_549");
Route::put("/update/{id}", "PageController@updatekelontong_549"); //digunakan u mengubah data 
Route::get("/delete/{id}", "PageController@deletekelontong_549");
});
?>