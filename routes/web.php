<?php

use App\Http\Controllers\AlbomController;
use App\Http\Controllers\PicturesController;
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
})->name('welcome');

Route::get('/index',[AlbomController::class, 'album'])->name('index');
Route::get('/AllPic/{id}',[PicturesController::class,'AllPic'])->name('collection');



Route::get('move/{id}',[AlbomController::class,'movePicture'])->name('movePicture');
Route::post('change',[AlbomController::class,'changePicAlbom'])->name('changePicAlbom');




Route::get('/AddAlbom',[AlbomController::class, 'create'])->name('create');
Route::post('/storeAblom',[AlbomController::class,'store'])->name('add-albom');
Route::get('/editAlbom/{id}',[AlbomController::class,'edit'])->name('editAlbom');
Route::post('updateAlbom/{id}',[AlbomController::class,'update'])->name('updateAlbom');
Route::post('destroies/{id}',[AlbomController::class,'destories'])->name('destroyAlbum');


Route::get('/AddPicture',[PicturesController::class, 'create'])->name('create.Picture');
Route::post('/storePicture',[PicturesController::class,'addPicture'])->name('add-Picture');
Route::get('/editPicture/{id}',[PicturesController::class,'edit'])->name('editAlbom');
Route::post('updatePicture/{id}',[PicturesController::class,'updatePicture'])->name('updatePicture');
Route::post('destroy/{id}',[PicturesController::class,'destroyPic'])->name('destroy');

