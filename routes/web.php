<?php
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',[
        'title' => "Home"
    ]);
});
Route::get('login',[LoginController::class,'index']);
Route::post('login',[LoginController::class,'login']);
Route::get('/admin-dashboard',[DashboardController::class])->middleware('auth');
