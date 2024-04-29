<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Config\AppController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Sanctum::routes();

Route::get('/', function () {
    $dbName = "Can't connect to Database";
    try {
        DB::connection()->getPdo();
        $dbName = DB::getDatabaseName();
        // echo "Connected successfully to the database.";
    } catch (\Exception $e) {
        die("Could not connect to the database. Error: " . $e->getMessage());
    }
    $data = [
        'Status' => true,
        'AppName' => env('APP_NAME'),
        'Tools' => "Recommended php version >= 8.2",
        'Php' => "Current php version: " . phpversion(),
        'Framework' => "Laravel Framework version: " . app()->version(),
        'DbName' => $dbName,
    ];
    return response()->json($data, 200);
});
Route::get('/login', function () {
    return response()->json(['message' => 'Please Pogin', 'error' => 'UNAUTHORIZED'], 401);
})->name('login.page');

Route::group([
    'prefix' => 'auth'
], function () {

    Route::group([], function () {
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::group([
    'prefix' => 'config',
    'middleware' => ['auth'],
], function () {
    Route::put('/set-language', [AppController::class, 'setLanguage']);
    Route::get('/get-menu', [AppController::class, 'getMenu']);
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth'],
], function () {
    Route::get('administration/user/list', [UserController::class, 'getUserList']);
});
