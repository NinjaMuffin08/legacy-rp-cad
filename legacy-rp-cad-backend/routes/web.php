<?php

use Illuminate\Support\Facades\Route;
use kanalumaddela\LaravelSteamLogin\Facades\SteamLogin;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Grouping of all the authentication routes together under /auth.
Route::prefix('auth')->group(function () {
    // Allow users to login using their steam account.
    // - {host}:{port}/auth/login/steam
    // - {host}:{port}/auth/auth/steam
    SteamLogin::routes(['controller' => LoginController::class]);
});

// Setup controller for handling frontend framework routing.
Route::get('/{path?}', [
    'uses' => 'FrontendController@show',
    'as' => 'ember',
    'where' => ['path' => '.*']
]);
