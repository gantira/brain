<?php

use App\Http\Controllers\{HomeController, DashboardController};
use Illuminate\Support\Facades\{Route, Auth};

Auth::routes([
    'verify' => true
]);

Route::get('/', HomeController::class)->name('home');

Route::middleware('auth')->group(function() {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
});
