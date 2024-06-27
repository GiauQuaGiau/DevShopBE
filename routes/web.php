<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('api');
});

Route::get('/403', function () {
    return response()->json([
        'code' => 403,
        'error' => 'UNAUTHORIZED',
    ], 403);;
})->name('UNAUTHORIZED');

Route::get('/401', function () {
    return response()->json([
        'code' => 401,
        'error' => 'NOT_FOUND',
    ], 401);;
})->name('NOT_FOUND');
