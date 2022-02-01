<?php

use App\Http\Controllers\Dashbord\CategoryController;
use App\Http\Controllers\Dashbord\DashboardController;
use App\Http\Controllers\Dashbord\ProductController;
use App\Http\Controllers\Dashbord\RolesAndPermissions;
use App\Http\Controllers\Dashbord\UsersController;
use Illuminate\Support\Facades\Route;


//this is dashboard routes

Route::middleware('auth')->prefix('dashboard/')->name('dashboard.')->group(function(){

    //dashboard route
    Route::get('home',[DashboardController::class,'home'])->name('home');

    //Users Routes
    Route::prefix('users')->name('users.')->group(function(){
        Route::get('index',[UsersController::class,'index'])->name('index');
        Route::get('destroy/{id}',[UsersController::class,'destroy'])->name('destroy');
        Route::get('edit/{id}',[UsersController::class,'edit'])->name('edit');
        Route::post('update/{id}',[UsersController::class,'update'])->name('update');
        Route::get('create',[UsersController::class,'create'])->name('create');
        Route::post('store',[UsersController::class,'store'])->name('store');
        Route::get('search',[UsersController::class,'search'])->name('search');
    });

    //Roles And Permissions
    Route::prefix('roles/')->name('roles.')->group(function(){
          Route::get('index',[RolesAndPermissions::class,'index'])->name('index');
          Route::post('permission_create',[RolesAndPermissions::class , 'CreatePermission'])->name('permission_create');
          Route::post('role_create',[RolesAndPermissions::class , 'CreateRole'])->name('role_create');
    });

    //categories routes
    Route::resource('categories',CategoryController::class);

    //products routes
    Route::resource('products',ProductController::class);
});
