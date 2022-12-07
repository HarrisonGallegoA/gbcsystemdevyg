<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DomosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\PlanServicioController;
use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\DomoCaracteristicaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ReservaDetalleController;
use App\Http\Controllers\VentasDetalleController;


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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


Route::get('/Usuarios', [UserController::class, 'index'])->name('ListUser');

Route::get('/Roles', function () {
    return view('Roles');
});


/* Route::get('domos', [DomosController::class, 'index'])->name('domoIndex'); */
/* Route::post('domos', [DomosController::class, 'guardar'])->name('domoGuardar'); */
/* Route::put('domos/{domo}', [DomosController::class, 'actualizar'])->name('domoActualizar'); */
//En las rutas registramos:
/* Route::delete('domos/{domo}', [DomosController::class, 'eliminar'])->name('domoEliminar');  */


Route::get('caracteristicas', [CaracteristicasController::class, 'index'])->name('caracteristicaIndex');
Route::post('caracteristicas', [CaracteristicasController::class, 'guardar'])->name('caracteristicaGuardar');
Route::put('caracteristicas/{caracteristica}', [CaracteristicasController::class, 'actualizar'])->name('caracteristicaActualizar');
//En las rutas registramos:
Route::delete('caracteristicas/{caracteristica}', [CaracteristicasController::class, 'eliminar'])->name('caracteristicaEliminar');


//rutas servicios
Route::get('servicios', [ServiciosController::class, 'index'])->name('servicioIndex');
Route::post('servicios', [ServiciosController::class, 'guardar'])->name('servicioGuardar');
Route::put('servicios/{servicio}', [ServiciosController::class, 'actualizar'])->name('servicioActualizar');
//En las rutas registramos:
Route::delete('servicios/{servicio}', [ServiciosController::class, 'eliminar'])->name('servicioEliminar');

/* Route::get('/', [DomoCaracteristicaController::class, 'index'])->name('domocaracteristicaindex'); */

Route::get('/domo/caracteristicas', [DomoCaracteristicaController::class, 'index'])->name('domocaracteristicaindex');
Route::post('/domo/guardar', [DomoCaracteristicaController::class, 'save'])->name('domocaracteristicaguardar');
Route::get('/domo/listar', [DomoCaracteristicaController::class, 'show'])->name('domocaracteristicalistar');
// Route::get('/domo/edit', [DomoCaracteristicaController::class, 'edit'])->name('domocaracteristicaedit');
// Route::resource('domocaracteristica/edit', DomoCaracteristicaController::class)->names('domocaracteristica');

Route::controller(DomoCaracteristicaController::class)->group(
    function () {
        Route::get('domo/editar/{id}', 'edit');
        Route::put('domo/actualizar/{id}', 'update');
    }
);

//rutas venta
Route::get('/venta/servicios', [VentasDetalleController::class, 'index'])->name('ventadetalleindex');
Route::post('/venta/guardar', [VentasDetalleController::class, 'save'])->name('ventadetalleguardar');
Route::get('/venta/listar', [VentasDetalleController::class, 'show'])->name('ventadetallelistar');

Route::controller(VentasDetalleController::class)->group(
    function () {
        Route::get('venta/editar/{id}', 'edit');
        Route::put('venta/actualizar/{id}', 'update');
    }
);

//rutas plan
Route::get('/plan/servicios', [PlanServicioController::class, 'index'])->name('planservicioindex');
Route::post('/plan/guardar', [PlanServicioController::class, 'save'])->name('planservicioguardar');
Route::get('/plan/listar', [PlanServicioController::class, 'show'])->name('planserviciolistar');


//rutas agenda

Route::get('agenda', [AgendaController::class, 'index'])->name('Agenda');
Route::get('agenda/mostrar/', [AgendaController::class, 'show']);
Route::get('agenda/mostrar/{agenda:id}', [AgendaController::class, 'showByDay'])->name("agenda.single");
Route::post('agenda/editar/{id}', [AgendaController::class, 'edit']);
Route::post('agenda/eliminar/{id}', [AgendaController::class, 'destroy']);
Route::post('agenda/agregar', [AgendaController::class, 'store'])->name('agregarAgenda');


//rutas Reserva
Route::get('/reserva/servicios', [ReservaDetalleController::class, 'index'])->name('reservadetalleindex');
Route::post('/reserva/guardar', [ReservaDetalleController::class, 'save'])->name('reservadetalleguardar');
Route::get('/reserva/listar', [ReservaDetalleController::class, 'show'])->name('reservadetallelistar');

Route::controller(ReservaDetalleController::class)->group(
    function () {
        Route::get('reserva/editar/{id}', 'edit');
        Route::put('reserva/actualizar/{id}', 'update');
    }
);
});

