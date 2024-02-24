<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

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

// Non Authenticated Routes
Route::get('/',[FrontController::class, 'home'])->name('index'); // Displays the index page
Route::get('/contact',[FrontController::class, 'contact'])->name('contact'); // Displays the contact page
Route::get('/legal',[FrontController::class, 'legal'])->name('legal'); // Displays the legal page
Route::get('/about-us',[FrontController::class,'aboutus'])->name('about-us'); // Displays the about us page

Route::post('/contact', [FrontController::class, 'contact'])->name('contact');