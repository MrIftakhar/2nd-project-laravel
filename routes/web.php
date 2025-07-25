<?php

use App\Models\Post;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use function Pest\Laravel\post;

Route::get('/', function () {
    return view('welcome', ['posts'=> post::paginate(5)]);
})->name('home');

Route::get('/create',[PostController::class,'create']);

Route::post('/store',[PostController::class,'ourfilestore'])->name('store');

Route::get('/edit/{id}',[PostController::class,'editData'])->name('edit');

Route::post('/update/{id}',[PostController::class,'updateData'])->name('update');

Route::get('/delete/{id}',[PostController::class,'deleteData'])->name('delete');