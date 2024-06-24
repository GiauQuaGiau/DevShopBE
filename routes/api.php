<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    $dbName = "Can't connect to Database";
    try {
        DB::connection()->getPdo();
        $dbName = DB::getDatabaseName();
    } catch (\Exception $e) {
        die("Could not connect to the database. Error: " . $e->getMessage());
    }
    $data = [
        'Status' => "OK!    ",
        'AppName' => env('APP_NAME'),
        'Tools' => "Recommended php version >= 8.2",
        'Php' => "Current php version: " . phpversion(),
        'Framework' => "Laravel Framework version: " . app()->version(),
        'DbName' => $dbName,
    ];
    return response()->json($data, 200);
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth'],
    ],
    function () {
        require_once app_path('Modules/Admin/Auth/routes.php');
    }
);
