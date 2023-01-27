<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TsfController;
use App\Http\Controllers\WeaponsController;
use App\Http\Controllers\VariantsController;


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
//CREAR
Route::get('/Tsf/create', [TsfController::class, 'create'])->name('Tsf.create');
Route::post('/Tsf', [TsfController::class, 'store'])->name('Tsf.store');
//EDIT/UPDATE
Route::get('/Tsf/{id}/editar', [TsfController::class, 'edit'])->name('Tsf.edit');
Route::put('/Tsf/{id}', [TsfController::class, 'update'])->name('Tsf.update');
//SHOW
Route::get('/Tsf/{id}/ver', [TsfController::class, 'show'])->name('Tsf.show');
//DELETE/FORM PARA CONFIRM
Route::delete('/Tsf/{id}', [TsfController::class, 'destroy'])->name('Tsf.destroy');
Route::get('/Tsf/{id}/confirmar',[TsfController::class, 'confirm'])->name('Tsf.confirm');
Route::get('/cancelar', function () {return redirect()->route('Tsf.index')->with('success', 'Accion cancelada');})->name('cancelar');

// WEAPONS
//INDEX
Route::get('/Tsf/weapons', [WeaponsController::class, 'index'])->name('Tsf.weapons');
//CREAR
Route::get('/Tsf/weapons/createWeapons', [WeaponsController::class, 'create'])->name('Tsf.createW');
Route::post('/Tsf/weapons', [WeaponsController::class, 'store'])->name('Tsf.storeW');
//EDIT/UPDATE
Route::get('/Tsf/weapons/{id}/editarWeapons', [WeaponsController::class, 'edit'])->name('Tsf.editW');
Route::put('/Tsf/weapons/{id}', [WeaponsController::class, 'update'])->name('Tsf.updateW');
//SHOW
Route::get('/Tsf/weapons/{id}/verWeapons', [WeaponsController::class, 'show'])->name('Tsf.showW');
//DELETE/FORM PARA CONFIRM
Route::delete('/Tsf/weapons/{id}', [WeaponsController::class, 'destroy'])->name('Tsf.destroyW');
Route::get('/Tsf/weapons/{id}/confirmarWeapons',[WeaponsController::class, 'confirm'])->name('Tsf.confirmW');
Route::get('/cancelarW', function () {return redirect()->route('Tsf.weapons')->with('success', 'Accion cancelada');})->name('cancelarW');

//VARIANTS
//INDEX
Route::get('/Tsf/variants', [VariantsController::class, 'index'])->name('Tsf.variants');
//CREAR
Route::get('/Tsf/variants/create', [VariantsController::class, 'create'])->name('Tsf.createV');
Route::post('/Tsf/variants', [VariantsController::class, 'store'])->name('Tsf.storeV');
//EDIT/UPDATE
Route::get('/Tsf/variants/{id}/editar', [VariantsController::class, 'edit'])->name('Tsf.editV');
Route::put('/Tsf/variants/{id}', [VariantsController::class, 'update'])->name('Tsf.updateV');
//SHOW
Route::get('/Tsf/variants/{id}/ver', [VariantsController::class, 'show'])->name('Tsf.showV');
//DELETE/FORM PARA CONFIRM
Route::delete('/Tsf/variants/{id}', [VariantsController::class, 'destroy'])->name('Tsf.destroyV');
Route::get('/Tsf/variants/{id}/confirmar',[VariantsController::class, 'confirm'])->name('Tsf.confirmV');
Route::get('/cancelarV', function () {return redirect()->route('Tsf.variants')->with('success', 'Accion cancelada');})->name('cancelarV');

//EJEMPLO
Route::get('/', function () {
    return view('welcome');
});
