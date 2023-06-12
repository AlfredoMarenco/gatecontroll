<?php

use App\Http\Livewire\DataBases;
use App\Http\Livewire\Reports;
use App\Http\Livewire\Scanner;
use App\Http\Livewire\Settings;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('scanner');
});

Route::get('/databases',DataBases::class)->name('databases');
Route::get('/reports',Reports::class)->name('reports');
Route::get('/settings',Settings::class)->name('settings');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/scanner',Scanner::class)->name('scanner');
});
