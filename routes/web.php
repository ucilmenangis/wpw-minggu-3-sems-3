<?php

use Illuminate\Support\Facades\Route;

// Acara 9

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tabel' , function (){
    return "hello world";
});

Route::get('/tabel/{id}' , function ($id){
    return "Your ID: " . $id;
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::get('dashboard/{name}', function ($name) {
    return "Welcome, " . $name;
});

// Acara 10

// Route groups
Route::prefix('admin')->group(function () {
    Route::get('/dashboard/{name}', function ($name) {
        return "Admin Dashboard Page for " . $name;
    });

    Route::get('/settings', function () {
        return "Admin Settings Page";
    });
});

// Route methods
Route::get('/about', function () { return "Get request"; });
Route::post('/about', function () { return "Post request"; });
Route::put('/about', function () { return "Put request"; });
Route::delete('/about', function () { return "Delete request"; });
Route::patch('/about', function () { return "Patch request"; });

// Fallback route
Route::fallback(function () {
    return "404 Not Found";
});
