<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TODOListItemController;

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
    return view('welcome', ['listItems' => \App\Models\ListItem::all()->sortBy('is_done')]);
});
Route::get('/saveNewItemRoute', [TODOListItemController::class, 'saveNewItem'])->name('saveNewItem');
Route::get('/doneRoute', [TODOListItemController::class, 'setDone'])->name('setDone');
Route::get('/clearRoute', [TODOListItemController::class, 'clearList'])->name('clearList');

Route::get('/test', [\App\Http\Controllers\TODOAPI::class, 'index'])->name('index');
