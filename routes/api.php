<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Config\AppController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

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

Route::group([
    'prefix' => 'auth'
],function () {
    
    Route::group([
        'middleware' => 'api',
    ], function () {       
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::post('/set-language', [AuthController::class, 'setLanguage']);
    });
});

Route::group([
    'prefix' => 'config'
],function () {
    
    Route::group([
        'middleware' => 'api',
    ], function () {       
        Route::put('/set-language', [AppController::class, 'setLanguage']);
        Route::get('/get-menu', [AppController::class, 'getMenu']);
    });
});

