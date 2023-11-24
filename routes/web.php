<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RaidController;
use App\Http\Controllers\RaidManagementController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/raid-management', [RaidManagementController::class, 'index'])->middleware(['auth','CheckRole:Raid Leader']);;

Route::middleware(['auth','CheckRole:Raid Leader'])->get('/raid-leader-only-route',[RaidController::class,'raidLeaderOnly']);
Route::middleware(['auth','CheckRole:Raid Leader, Raid Assist, Raider'])->get('/shared-access-route',[RaidController::class, 'sharedAccessRoute']);
Route::middleware(['auth'])->get('/common-route', [RaidController::class, 'commonRoute']);
