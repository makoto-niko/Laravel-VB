<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Route::get('/index', [App\Http\Controllers\PostsController::class, 'index']);
//Route::get('/show', [App\Http\Controllers\PostsController::class, 'show']);
Route::get('/index', [App\Http\Controllers\PostsController::class, 'index'])->name('index');
Route::get('/create', [App\Http\Controllers\PostsController::class, 'showCreate'])->name('show.create');
Route::post('/create', [App\Http\Controllers\PostsController::class, 'storePost'])->name('store.post');
Route::get('/edit/{id}', [App\Http\Controllers\PostsController::class, 'showEdit'])->name('show.edit');
Route::post('/edit/{id}', [App\Http\Controllers\PostsController::class, 'registEdit'])->name('regist.edit');
Route::delete('/delete/{id}', [App\Http\Controllers\PostsController::class, 'deletePost'])->name('delete');


require __DIR__ . '/auth.php';
