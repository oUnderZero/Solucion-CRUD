<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SensoUsuarios;
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

 
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', SensoUsuarios::class);
    Route::get('/senso', SensoUsuarios::class)->name('senso');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
