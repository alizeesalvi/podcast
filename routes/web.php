<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PodcastsController;


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


Route::get('/', [PodcastsController::class,'index'])->name('podcasts.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my-podcast', [PodcastsController::class,'myPodcast'])->name('podcast.myPodcast');
    Route::get('/my-podcast/{podcast}/edit', [PodcastsController::class,'edit'])->name('podcast.edit');
    Route::put('/my-podcast/{podcast}', [PodcastsController::class,'update'])->name('podcast.update');
    Route::get('/podcast/create', [PodcastsController::class,'create'])->name('podcast.create');
    Route::post('/podcast', [PodcastsController::class,'store'])->name('podcast.store');
    Route::delete('/my-podcast/{podcast}', [PodcastsController::class,'destroy'])->name('podcast.destroy');


});

Route::get('/podcast/{podcast}', [PodcastsController::class,'show'])->name('podcast.show');


require __DIR__.'/auth.php';
