<?php

use App\Modules\Admin\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('/', function() {
        return response()->json(['Module Admin Auth'], 200);
    });
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::group([], function () {
    // });

});
