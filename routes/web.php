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
    Route::get('/format', [HomeController::class, 'format'])->name('format');
    Route::get('/factvote', [FactVoteController::class, 'create'])->name('factvote');
    Route::get('/searchlocation/{id}/{election}', [FactvoteController::class, 'searchlocation'])->name('factvote.searchlocation');
    Route::get('/searchtable/{id}/{election}', [FactvoteController::class, 'searchtable'])->name('factvote.searchtable');
    Route::get('/votes/{id}', [FactvoteController::class, 'votes'])->name('factvote.votes');
    Route::post('/factvote', [FactvoteController::class, 'store'])->name('factvote.store');
    Route::get('/searchvotes', [HomeController::class, 'searchvotes'])->name('home.searchvotes');

    // PROCESS FOR STORE IMG
    Route::post('/factvoteimg', [FactvoteController::class, 'img'])->name('factvote.img');
    Route::get('/searchimg/{id}/{election}', [FactvoteController::class, 'searchimg'])->name('factvote.searchimg');
    
    // PROCESS FOR NEWS
    Route::get('/news', [FactCountVotesController::class, 'news'])->name('factcountvote.news');
    Route::post('/news', [FactCountVotesController::class, 'storenews'])->name('factcountvote.storenews');

    // PROCESS FOR COUNT VOTES
    Route::get('/searchlocationfcv/{id}', [FactCountVotesController::class, 'searchlocationfcv'])->name('factcountvote.searchlocationfcv');
    Route::get('/searchtablefcv/{id}', [FactCountVotesController::class, 'searchtablefcv'])->name('factcountvote.searchtablefcv');
    Route::get('/searchpotential/{id}', [FactCountVotesController::class, 'searchpotential'])->name('factcountvote.searchpotential');
    Route::get('/factcountvote', [FactCountVotesController::class, 'create'])->name('factcountvote.create');
    Route::post('/factcountvote', [FactCountVotesController::class, 'store'])->name('factcountvote.store');

    Route::get('/citiesrequest', [HomeController::class, 'citiesrequest'])->name('home.citiesrequest');

    Route::get('/countvotesrequest', [HomeController::class, 'countvotesrequest'])->name('home.countvotesrequest');

    Route::get('/countvotes', [HomeController::class, 'countvotes'])->name('countvotes');

    Route::get('/potentialvotersrequest/{id}', [HomeController::class, 'potentialvotersrequest'])->name('potentialvotersrequest');
    
    // PROCESS DASHBOARD
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/searchlocationcountvotesdash/{id}', [HomeController::class, 'searchlocationcountvotesdash'])->name('home.searchlocationcountvotesdash');

    Route::get('/searchcountvotesdash/{id}', [HomeController::class, 'searchcountvotesdash'])->name('home.searchcountvotesdash');
    
    
});
