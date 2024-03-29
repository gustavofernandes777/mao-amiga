<?php

use App\Http\Controllers\AulasController;
use App\Http\Controllers\CommentController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [AulasController::class, 'listaAulasIndex'])->name('aula.listaIndex');

Route::middleware(['auth'])->group(function (){
    Route::get('/user', [AulasController::class, 'userAulasList'])->name('aula.userList');
    Route::get('/cadastro-aulas', [AulasController::class, 'cadastraAula'])->name('aula.cadastra');
    Route::get('/aula/edit-aula/{id}', [AulasController::class, 'edit'])->name('aula.edit');
});
Route::delete('/comment/delete{id}', [CommentController::class, 'deleteComment'])->name('comment.delete');

Route::post('/comment/store', [CommentController::class, 'store'])->name('comment.add');
Route::post('/reply/store', [CommentController::class, 'replyStore'])->name('reply.add');

Route::any('/search/result', [AulasController::class, 'search'])->name('aula.search');
Route::delete('/user', [AulasController::class, 'clearHistoric'])->name('aula.clearHistoric');
Route::put('/aula/{id}', [AulasController::class, 'update'])->name('aula.update');
Route::delete('/aula/{id}', [AulasController::class, 'destroy'])->name('aula.destroy');
Route::get('/aula/download/{id}', [AulasController::class, 'fileDownload'])->name('aula.fileDownload');
Route::get('/aula/{id}', [AulasController::class, 'viewAula'])->name('aula.viewAula');
Route::get('/search', [AulasController::class, 'searchList'])->name('aula.searchList');
Route::post('/cadastro-aulas', [AulasController::class, 'store'])->name('aulas.store');
Route::get('/index', [AulasController::class, 'listaAulasIndex'])->name('aula.listaIndex');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';