<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EspacioController, FacturacionController, GrupoController, ComunicacionController, DestinatarioController, InventarioController, LogController, MatriculaController, PeriodocalificacionController, PermisoController, PersonalController, PlazomatriculaController, PlazoprescripcionController, PrescripcionController, PreferenciahorarioController, PrestamoController, ProfesorController, ReservaespacioController, TutorController, SalarioController, TitulacionController, ActividadController, AlumnoController,AsistenciaController, CalificacionController, CategoriaController, RolController};
use App\Models\Plazomatricula;
use Database\Seeders\PreferenciahorarioSeeder;

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
    return redirect()->route('login');
});

Route::get('/administracion', function(){
	return view('administracion/panel');
});

Route::get('/panel-grupos', function(){
	return view('administracion/panel-grupos');
})->name('panel-grupos');

Route::get('/dashboard', function () {
    return view('administracion/panel');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

Route::resource('espacios', EspacioController::class)->middleware(['auth']);
Route::resource('grupos', GrupoController::class)->middleware(['auth']);
Route::resource('facturaciones', FacturacionController::class)->middleware(['auth']);
Route::resource('comunicaciones', ComunicacionController::class)->middleware(['auth']);
Route::resource('destinatarios', DestinatarioController::class)->middleware(['auth']);
Route::resource('actividades', ActividadController::class)->middleware(['auth']);
Route::resource('alumnos', AlumnoController::class);
Route::resource('tutores', TutorController::class);
Route::resource('asistencias', AsistenciaController::class)->middleware(['auth']);
Route::resource('calificaciones', CalificacionController::class)->middleware(['auth']);
Route::resource('categorias', CategoriaController::class)->middleware(['auth']);
Route::resource('inventario', InventarioController::class)->middleware(['auth']);
Route::resource('logs', LogController::class)->middleware(['auth']);
Route::resource('matriculas', MatriculaController::class)->middleware(['auth']);
Route::resource('periodoscalificaciones', PeriodocalificacionController::class)->middleware(['auth']);
Route::resource('permisos', PermisoController::class)->middleware(['auth']);
Route::resource('personales', PersonalController::class)->middleware(['auth']);
Route::resource('plazosmatriculas', PlazomatriculaController::class)->middleware(['auth']);
Route::resource('plazosprescripciones', PlazoprescripcionController::class)->middleware(['auth']);
Route::resource('preferenciashorarios', PreferenciahorarioController::class)->middleware(['auth']);
Route::resource('prescripciones', PrescripcionController::class)->middleware(['auth']);
Route::resource('prestamos', PrestamoController::class)->middleware(['auth']);
Route::resource('profesores', ProfesorController::class)->middleware(['auth']);
Route::resource('reservasespacios', ReservaespacioController::class)->middleware(['auth']);
Route::resource('roles', RolController::class)->middleware(['auth']);
Route::resource('salarios', SalarioController::class)->middleware(['auth']);
Route::resource('titulaciones', TitulacionController::class)->middleware(['auth']);

//Selección de plazo para matricular alumno
Route::post('plazomatricula', [PlazomatriculaController::class, 'plazomatricula'])->name('plazosmatriculas.plazomatricula');

//Selección de plazo para preinscribir alumno
Route::post('plazoprescripcion', [PlazoprescripcionController::class, 'plazoprescripcion'])->name('plazosprescripciones.plazoprescripcion');
//Calificar grupo
Route::post('calificargrupo', [CalificacionController::class, 'calificarGrupo'])->name('calificaciones.calificar-grupo');
Route::post('asignarasistencia', [AsistenciaController::class, 'pasarListaGrupo'])->name('asistencia.pasarlista');

Route::get('verlistaasistencia/{alumno}', [AsistenciaController::class, 'verasistencias'])->name('asistencia.verlista');

