<?php

use App\Http\Controllers\FactCountVotesController;
use App\Http\Controllers\FactVoteController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
});

// Auth::routes();
Auth::routes(['register' => false]);


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/factvote', [FactVoteController::class, 'create'])->name('factvote');
    Route::get('/searchlocation/{id}', [FactvoteController::class, 'searchlocation'])->name('factvote.searchlocation');
    Route::get('/searchtable/{id}', [FactvoteController::class, 'searchtable'])->name('factvote.searchtable');
    Route::post('/factvote', [FactvoteController::class, 'store'])->name('factvote.store');
    Route::get('/searchvotes', [HomeController::class, 'searchvotes'])->name('home.searchvotes');
    Route::get('/factcountvote', [FactCountVotesController::class, 'create'])->name('factcountvote.create');
    Route::get('/searchlocationfcv/{id}', [FactCountVotesController::class, 'searchlocationfcv'])->name('factcountvote.searchlocationfcv');
    Route::get('/searchtablefcv/{id}', [FactCountVotesController::class, 'searchtablefcv'])->name('factcountvote.searchtablefcv');
    Route::post('/factcountvote', [FactCountVotesController::class, 'store'])->name('factcountvote.store');
});
