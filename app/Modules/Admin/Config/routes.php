<?php
use App\Modules\Admin\Config\Controllers\AppController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'config',
    'middleware' => ['auth'],
], function () {
    Route::get('/', function () {
        return response()->json(['Module Admin Config'], 200);
    });

    Route::put('/set-language', [AppController::class, 'setLanguage']);
    Route::get('/get-menu', [AppController::class, 'getMenu']);
});
