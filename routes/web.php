<?php

use App\Http\Controllers\FilmController;
use App\Models\Film;
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
    return view('welcome');
});

Route::get('cinemovies/ajouter', [FilmController::class, 'create'])->name('cinemovies.create');

Route::post('cinemovies/enregistrer', [FilmController::class, 'store'])->name('cinemovies.store');

Route::get('cinemovies/index', [FilmController::class, 'index'])->name('cinemovies.index');

Route::get('cinemovies/editer/{id}', [FilmController::class, 'edit'])->name('cinemovies.edit');
Route::patch('cinemovies/update/{id}', [FilmController::class, 'update'])->name('cinemovies.update');

Route::delete('cinemovies/destroy/{id}', [FilmController::class, 'destroy'])->name('cinemovies.destroy');


