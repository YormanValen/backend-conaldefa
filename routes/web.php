<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NoticiaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResolutionController;
use App\Http\Controllers\GraduateController;


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

Route::redirect('/', '/admin');


Route::get('/admin', [HomeController::class, 'index'])->name('home.index');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

    Route::get('/importar-egresados', function () {
        return view('egresados.importar-egresados');
    })->name('importar-egresados');

    Route::post('/importar-egresados', [GraduateController::class, 'importGraduates'])->name('import.graduates');
});





Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
Route::get('/index', [NoticiaController::class, 'getNoticias'])->name('noticias.getNoticias');
Route::get('/index/{noticia}', [NoticiaController::class, 'getNoticia'])->name('noticias.getNoticia');

// Ruta para mostrar el formulario de edición
Route::get('/noticias/{noticia}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');

// Ruta para actualizar la noticia
Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
// Ruta para eliminar noticias
Route::delete('/noticias/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');
Route::post('/contact', [ContactController::class, 'send']);
Route::resource('resolutions', ResolutionController::class);
Route::get('api/resolutions', [ResolutionController::class, 'getResoluciones']);
Route::get('api/resolutions/{resolution}', [ResolutionController::class, 'getResolucion']);
