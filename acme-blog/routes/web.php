<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create-blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/store-blog', [BlogController::class, 'store'])->name('blog.store');

    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');//render edit view
    Route::put('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');

    Route::delete('/delete-blog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    Route::get('/dashboard', [BlogController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';
