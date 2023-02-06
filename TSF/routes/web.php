<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TsfController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WeaponsController;
use App\Http\Controllers\VariantsController;
use App\Http\Controllers\UsuariosController;


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

//TSF
//INDEX
Route::get('/Tsf', [TsfController::class, 'index'])->name('Tsf.index');
//SHOW
Route::get('/Tsf/{id}/ver', [TsfController::class, 'show'])->name('Tsf.show');

// WEAPONS
//INDEX
Route::get('/Tsf/weapons', [WeaponsController::class, 'index'])->name('Tsf.weapons');
//SHOW
Route::get('/Tsf/weapons/{id}/verWeapons', [WeaponsController::class, 'show'])->name('Tsf.showW');

//VARIANTS
//INDEX
Route::get('/Tsf/variants', [VariantsController::class, 'index'])->name('Tsf.variants');
//SHOW
Route::get('/Tsf/variants/{id}/ver', [VariantsController::class, 'show'])->name('Tsf.showV');

//USUARIOS
//REGISTER
Route::get('/Tsf/usuarios/register', [UsuarioController::class, 'create'])->name('Tsf.createU');
Route::post('/Tsf/usuarios', [UsuarioController::class, 'store'])->name('Tsf.storeU');
//LOGIN
Route::get('/Tsf/usuarios/login', [UsuarioController::class, 'loginForm'])->name('Tsf.loginForm');
Route::post('/Tsf/usuarios/iniciando', [UsuarioController::class, 'logSes'])->name('Tsf.logSes');
//CERRAR
Route::get('/Tsf/usuarios/logoff', [UsuarioController::class, 'cerrarSes'])->name('Tsf.closeSesion');

//MIDDLEWARE
Route::group(['middleware' => 'seguridad'], function(){
    //Admin
    //TSF
    //CREAR
    Route::get('/Tsf/create', [TsfController::class, 'create'])->name('Tsf.create');
    Route::post('/Tsf', [TsfController::class, 'store'])->name('Tsf.store');
    //EDIT/UPDATE
    Route::get('/Tsf/{id}/editar', [TsfController::class, 'edit'])->name('Tsf.edit');
    Route::put('/Tsf/{id}', [TsfController::class, 'update'])->name('Tsf.update');
    //DELETE/FORM PARA CONFIRM
    Route::delete('/Tsf/{id}', [TsfController::class, 'destroy'])->name('Tsf.destroy');
    Route::get('/Tsf/{id}/confirmar',[TsfController::class, 'confirm'])->name('Tsf.confirm');
    Route::get('/cancelar', function () {return redirect()->route('Tsf.index')->with('success', 'Accion cancelada');})->name('cancelar');
    
    //WEAPONS
    //CREAR
    Route::get('/Tsf/weapons/createWeapons', [WeaponsController::class, 'create'])->name('Tsf.createW');
    Route::post('/Tsf/weapons', [WeaponsController::class, 'store'])->name('Tsf.storeW');
    //EDIT/UPDATE
    Route::get('/Tsf/weapons/{id}/editarWeapons', [WeaponsController::class, 'edit'])->name('Tsf.editW');
    Route::put('/Tsf/weapons/{id}', [WeaponsController::class, 'update'])->name('Tsf.updateW');
    //DELETE/FORM PARA CONFIRM
    Route::delete('/Tsf/weapons/{id}', [WeaponsController::class, 'destroy'])->name('Tsf.destroyW');  
    Route::get('/Tsf/weapons/{id}/confirmarWeapons',[WeaponsController::class, 'confirm'])->name('Tsf.confirmW'); 
    Route::get('/cancelarW', function () {return redirect()->route('Tsf.weapons')->with('success', 'Accion cancelada');})->name('cancelarW'); 
    
    //VARIANTS
    //CREAR
    Route::get('/Tsf/variants/create', [VariantsController::class, 'create'])->name('Tsf.createV');
    Route::post('/Tsf/variants', [VariantsController::class, 'store'])->name('Tsf.storeV');
    //EDIT/UPDATE
    Route::get('/Tsf/variants/{id}/editar', [VariantsController::class, 'edit'])->name('Tsf.editV');
    Route::put('/Tsf/variants/{id}', [VariantsController::class, 'update'])->name('Tsf.updateV');
    //DELETE/FORM PARA CONFIRM
    Route::delete('/Tsf/variants/{id}', [VariantsController::class, 'destroy'])->name('Tsf.destroyV');
    Route::get('/Tsf/variants/{id}/confirmar',[VariantsController::class, 'confirm'])->name('Tsf.confirmV');
    Route::get('/cancelarV', function () {return redirect()->route('Tsf.variants')->with('success', 'Accion cancelada');})->name('cancelarV');

})->middleware('auth');
//EJEMPLO
Route::get('/', function () {
    return view('welcome');
});
