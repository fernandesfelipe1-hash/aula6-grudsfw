<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return view('teste');
});

// Route::get('/', [Ecommerce::class, 'index']);
