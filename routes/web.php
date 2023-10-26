<?php

use App\Http\Controllers\FactCountVotesController;
use App\Http\Controllers\FactNewsController;
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
        if( in_array( Auth::user()->fk_roles, [4] ) ){
            return redirect()->route('monitor.dashboard');
        }
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
    Route::get('/searchimg/{id}/{election}', [FactVoteController::class, 'searchimg'])->name('factvote.searchimg');
    Route::post('/searchimg', [FactvoteController::class, 'img'])->name('factvote.img');
    
    // PROCESS FOR NEWS
    Route::get('/coordinators_new', [FactNewsController::class, 'index'])->name('coordinators.news');
    Route::get('/news', [FactCountVotesController::class, 'news'])->name('factcountvote.news');
    Route::post('/news', [FactCountVotesController::class, 'storenews'])->name('factcountvote.storenews');
    Route::post('/news/find', [FactCountVotesController::class, 'newsFind'])->name('news.find');

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
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('monitor.dashboard');


    Route::get('/graphicscountvotes', function () {
    return view('monitor.graphicscountvotes');
    });
    // Route::get('/graphicscountvotes', [HomeController::class, 'graphicscountvotes'])->name('monitor.graphicscountvotes');
    // Route::get('/graphicsalcaldia', [HomeController::class, 'graphicsalcaldia'])->name('monitor.graphicsalcaldia');
    // Route::get('/graphicsgobernacion', [HomeController::class, 'graphicsgobernacion'])->name('monitor.graphicsgobernacion');

    Route::get('/searchgobernaciondash/{id}', [HomeController::class, 'searchgobernaciondash'])->name('home.searchgobernaciondash');
    Route::get('/searchgobernacionfdash/{id}', [HomeController::class, 'searchgobernacionfdash'])->name('home.searchgobernacionfdash');
    Route::get('/searchgobernaciondepdash', [HomeController::class, 'searchgobernaciondepdash'])->name('home.searchgobernaciondepdash');
    Route::get('/searchalcaldiadash/{id}', [HomeController::class, 'searchalcaldiadash'])->name('home.searchalcaldiadash');
    Route::get('/searchalcaldiafdash', [HomeController::class, 'searchalcaldiafdash'])->name('home.searchalcaldiafdash');


    Route::get('/searchlocationcountvotesdash/{id}', [HomeController::class, 'searchlocationcountvotesdash'])->name('home.searchlocationcountvotesdash');
    Route::get('/searchcountvotesdash/{id}', [HomeController::class, 'searchcountvotesdash'])->name('home.searchcountvotesdash');
    
    
});
