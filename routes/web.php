<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
App::setLocale('es');
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/bandeja', [MailController::class, 'index'])->name('bandeja');
Route::get('/visto/{mail}', [MailController::class, 'visto'])->name('visto');

Route::get('/enviados', [MailController::class, 'enviados'])->name('enviados');

Route::get('/bandeja/{mail}', [MailController::class, 'show'])->name('bandeja.show');
Route::get('/mail/crear',[MailController::class, 'create'])->name("mails.create");
Route::post('/mail', [MailController::class, 'store'])->name("mails.store");
