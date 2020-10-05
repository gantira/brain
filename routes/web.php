<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\{Route, Auth};

Auth::routes([
    'verify' => true
]);

Route::get('/', HomeController::class)->name('home');
