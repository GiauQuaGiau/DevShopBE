<?php

use App\Http\Controllers\app\Modules\Admin\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route('auth', function() {
    return response()->json(['Module Admin Auth'], 200);
});
Route::group([
    'prefix' => 'auth'
], function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::group([], function () {
    // });

});
