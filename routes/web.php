<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Agricultures;
use App\Http\Livewire\Parcelles;
use App\Http\Livewire\Employes;
use App\Http\Livewire\Intervention;
use App\Http\Livewire\Tarifs;
use App\Http\Livewire\Users;
use App\Http\Livewire\Data;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
Route::get('/agricul', function () {
    return view('livewire.agricultures');
})->middleware(['auth'])->name('agri');*/

Route::get('/agricul', Agricultures::class, 'livewire.agricultures')->middleware(['auth'])->name('agri');
Route::get('/parc', Parcelles::class, 'livewire.parcelles')->middleware(['auth'])->name('parc');
Route::get('/emp', Employes::class, 'livewire.employes')->middleware(['auth'])->name('emp');
Route::get('/int', Intervention::class, 'livewire.intervention')->middleware(['auth'])->name('int');
Route::get('/tar', Tarifs::class, 'livewire.tarifs')->middleware(['auth'])->name('tar');
Route::get('/us', Users::class, 'livewire.users')->middleware(['auth'])->name('us');
Route::get('/data', Data::class, 'livewire.data')->middleware(['auth'])->name('data');

require __DIR__.'/auth.php';
