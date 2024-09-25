<?php

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\BlockCaliforniaUsers;

Route::middleware([BlockCaliforniaUsers::class])->group(function () {
    Route::get('/', function () {
        return view('laravel-project');
    });
});
