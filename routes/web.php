<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;


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

Route::resource('/empleados', EmpleadoController::class)->middleware('auth');
//Auth::routes();

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');


// Cuando el usuario se autentique con auth ellos van a ir directamente a empleados comtroller y especificamente en el metodo index
/*Route::group(['middleware' => 'auth'])->group(function () {
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});*/

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});



/*Route::group(['mildware' => 'auth'])->group(function () {
});*/
