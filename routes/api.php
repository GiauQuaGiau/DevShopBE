<?php

use App\Http\Controllers\Auth\AuthController;
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
    });
});