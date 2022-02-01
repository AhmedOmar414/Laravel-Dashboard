<?php

use App\Http\Controllers\Dashbord\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect('dashboard/home');
});
Auth::routes();

Route::get('/home', [DashboardController::class, 'home'])->name('home');
