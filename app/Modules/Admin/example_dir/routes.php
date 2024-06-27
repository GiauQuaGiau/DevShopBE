<?php

// use App\Http\Controllers\app\Modules\Admin\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route('example', function() {
    return response()->json(['Module example'], 200);
});
Route::group([
    'prefix' => 'example'
], function () {

    // Route::post('/login', [AuthController::class, 'login']);
    // Route::post('/logout', [AuthController::class, 'logout']);
    // Route::group([], function () {
    // });

});
