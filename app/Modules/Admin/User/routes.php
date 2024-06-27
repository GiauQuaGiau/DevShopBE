<?php
use App\Modules\Admin\Config\Controllers\AppController;
use App\Modules\Admin\User\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'user',
    'middleware' => ['auth'],
], function () {
    Route::get('/', function () {
        return response()->json(['Module Admin User'], 200);
    });

    Route::get('administration/user/list', [UserController::class, 'getUserList']);
    Route::post('administration/user/list/new-user', [UserController::class, 'createUser']);
});
