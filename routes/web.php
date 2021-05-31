<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
//use Resources\Views\Auth;
use Auth;
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
    return view('auth.login');
});

/*
Route::get('/empleados', function () {
    return view('empleados.index');
});

Route::get('/empleados/create', [EmpleadoController::class, 'create']);*/

Route::resource('/empleados',EmpleadoController::class);
//Auth::routes();


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



