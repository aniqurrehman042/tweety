<?php

use App\Http\Controllers\FollowController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\TweetController;
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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/tweets', [TweetController::class, 'index'])->name('home');
    Route::post('/tweets', [TweetController::class, 'store'])->name('tweets-store');
    Route::get('/profiles/{user:username}/edit', [ProfileController::class, 'edit'])->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', [ProfileController::class, 'update'])->middleware('can:edit,user');
    Route::get('/explore', [ExploreController::class, 'index']);
});

Route::get('/profiles/{user:username}', [ProfileController::class, 'show'])->name('profile');
Route::post('/profiles/{user:username}/follow', [FollowController::class, 'store'])->name('follow');
