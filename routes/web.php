<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EspacioController, FacturacionController, GrupoController, ComunicacionController, DestinatarioController, InventarioController, LogController, MatriculaController, PeriodocalificacionController, PermisoController, PersonalController, PlazomatriculaController, PlazoprescripcionController, PrescripcionController, PreferenciahorarioController, PrestamoController, ProfesorController, ReservaespacioController, TutorController, SalarioController, TitulacionController, ActividadController, AlumnoController,AsistenciaController, CalificacionController, CategoriaController, RolController, RolespermisoController};
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

Route::get('espacios', [EspacioController::class, 'index'])->name('espacios.index')->middleware(['auth']);
Route::get('espacios/create', [EspacioController::class, 'create'])->name('espacios.create')->middleware(['auth']);
Route::post('espacios/store/', [EspacioController::class, 'store'])->name('espacios.store')->middleware(['auth']);
Route::get('espacios/{espacio}/edit', [EspacioController::class, 'edit'])->name('espacios.edit')->middleware(['auth']);
Route::put('espacios/update/{espacio}', [EspacioController::class, 'update'])->name('espacios.update')->middleware(['auth']);
Route::get('espacios/show/{espacio}', [EspacioController::class, 'show'])->name('espacios.show')->middleware(['auth']);
//Grupos
Route::get('grupos', [GrupoController::class, 'index'])->name('grupos.index')->middleware(['auth']);
Route::get('grupos/create', [GrupoController::class, 'create'])->name('grupos.create')->middleware(['auth']);
Route::post('grupos/store', [GrupoController::class, 'store'])->name('grupos.store')->middleware(['auth']);
Route::get('grupos/{grupo}/edit', [GrupoController::class, 'edit'])->name('grupos.edit')->middleware(['auth']);
Route::put('grupos/update/{grupo}', [GrupoController::class, 'update'])->name('grupos.update')->middleware(['auth']);
Route::get('grupos/show/{grupo}', [GrupoController::class, 'show'])->name('grupos.show')->middleware(['auth']);
//Facturaciones
Route::get('facturaciones', [FacturacionController::class, 'index'])->name('facturaciones.index')->middleware(['auth']);
Route::get('facturaciones/create', [FacturacionController::class, 'create'])->name('facturaciones.create')->middleware(['auth']);
Route::post('facturaciones/store', [FacturacionController::class, 'store'])->name('facturaciones.store')->middleware(['auth']);
Route::get('facturaciones/{facturacione}/edit', [FacturacionController::class, 'edit'])->name('facturaciones.edit')->middleware(['auth']);
Route::put('facturaciones/update/{facturacione}', [FacturacionController::class, 'update'])->name('facturaciones.update')->middleware(['auth']);
Route::get('facturaciones/show/{facturacione}', [FacturacionController::class, 'show'])->name('facturaciones.show')->middleware(['auth']);
//Comunicaciones
Route::get('comunicaciones', [ComunicacionController::class, 'index'])->name('comunicaciones.index')->middleware(['auth']);
Route::get('comunicaciones/create', [ComunicacionController::class, 'create'])->name('comunicaciones.create')->middleware(['auth']);
Route::post('comunicaciones/store', [ComunicacionController::class, 'store'])->name('comunicaciones.store')->middleware(['auth']);
Route::get('comunicaciones/{comunicacione}/edit', [ComunicacionController::class, 'edit'])->name('comunicaciones.edit')->middleware(['auth']);
Route::put('comunicaciones/update/{comunicacione}', [ComunicacionController::class, 'update'])->name('comunicaciones.update')->middleware(['auth']);
Route::get('comunicaciones/show/{comunicacione}', [ComunicacionController::class, 'show'])->name('comunicaciones.show')->middleware(['auth']);
//Destinatarios
Route::get('destinatarios', [DestinatarioController::class, 'index'])->name('destinatarios.index')->middleware(['auth']);
Route::get('destinatarios/create', [DestinatarioController::class, 'create'])->name('destinatarios.create')->middleware(['auth']);
Route::post('destinatarios/store', [DestinatarioController::class, 'store'])->name('destinatarios.store')->middleware(['auth']);
Route::get('destinatarios/{destinatario}/edit', [DestinatarioController::class, 'edit'])->name('destinatarios.edit')->middleware(['auth']);
Route::put('destinatarios/update/{destinatario}', [DestinatarioController::class, 'update'])->name('destinatarios.update')->middleware(['auth']);
Route::get('destinatarios/show/{destinatario}', [DestinatarioController::class, 'show'])->name('destinatarios.show')->middleware(['auth']);
//Actividades
Route::get('actividades', [ActividadController::class, 'index'])->name('actividades.index')->middleware(['auth']);
Route::get('actividades/create', [ActividadController::class, 'create'])->name('actividades.create')->middleware(['auth']);
Route::post('actividades/store', [ActividadController::class, 'store'])->name('actividades.store')->middleware(['auth']);
Route::get('actividades/{actividade}/edit', [ActividadController::class, 'edit'])->name('actividades.edit')->middleware(['auth']);
Route::put('actividades/update/{actividade}', [ActividadController::class, 'update'])->name('actividades.update')->middleware(['auth']);
Route::get('actividades/show/{actividade}', [ActividadController::class, 'show'])->name('actividades.show')->middleware(['auth']);
//Alumnos
Route::get('alumnos', [AlumnoController::class, 'index'])->name('alumnos.index')->middleware(['auth']);
Route::get('alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create')->middleware(['auth']);
Route::post('alumnos/store', [AlumnoController::class, 'store'])->name('alumnos.store')->middleware(['auth']);
Route::get('alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit')->middleware(['auth']);
Route::put('alumnos/update/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update')->middleware(['auth']);
Route::get('alumnos/show/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show')->middleware(['auth']);
//Tutores
Route::get('tutores', [TutorController::class, 'index'])->name('tutores.index')->middleware(['auth']);
Route::get('tutores/create', [TutorController::class, 'create'])->name('tutores.create')->middleware(['auth']);
Route::post('tutores/store', [TutorController::class, 'store'])->name('tutores.store')->middleware(['auth']);
Route::get('tutores/{tutore}/edit', [TutorController::class, 'edit'])->name('tutores.edit')->middleware(['auth']);
Route::put('tutores/update/{tutore}', [TutorController::class, 'update'])->name('tutores.update')->middleware(['auth']);
Route::get('tutores/show/{tutore}', [TutorController::class, 'show'])->name('tutores.show')->middleware(['auth']);
//Asistencias
Route::get('asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index')->middleware(['auth']);
Route::get('asistencias/create', [AsistenciaController::class, 'create'])->name('asistencias.create')->middleware(['auth']);
Route::post('asistencias/store', [AsistenciaController::class, 'store'])->name('asistencias.store')->middleware(['auth']);
Route::get('asistencias/{asistencia}/edit', [AsistenciaController::class, 'edit'])->name('asistencias.edit')->middleware(['auth']);
Route::put('asistencias/update/{asistencia}', [AsistenciaController::class, 'update'])->name('asistencias.update')->middleware(['auth']);
Route::get('asistencias/show/{asistencia}', [AsistenciaController::class, 'show'])->name('asistencias.show')->middleware(['auth']);
//Calificaciones
Route::get('calificaciones', [CalificacionController::class, 'index'])->name('calificaciones.index')->middleware(['auth']);
Route::get('calificaciones/create', [CalificacionController::class, 'create'])->name('calificaciones.create')->middleware(['auth']);
Route::post('calificaciones/store', [CalificacionController::class, 'store'])->name('calificaciones.store')->middleware(['auth']);
Route::get('calificaciones/{calificacione}/edit', [CalificacionController::class, 'edit'])->name('calificaciones.edit')->middleware(['auth']);
Route::put('calificaciones/update/{calificacione}', [CalificacionController::class, 'update'])->name('calificaciones.update')->middleware(['auth']);
Route::get('calificaciones/show/{calificacione}', [CalificacionController::class, 'show'])->name('calificaciones.show')->middleware(['auth']);
//Categorias
Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index')->middleware(['auth']);
Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categorias.create')->middleware(['auth']);
Route::post('categorias/store', [CategoriaController::class, 'store'])->name('categorias.store')->middleware(['auth']);
Route::get('categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit')->middleware(['auth']);
Route::put('categorias/update/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update')->middleware(['auth']);
Route::get('categorias/show/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show')->middleware(['auth']);
//Inventario
Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index')->middleware(['auth']);
Route::get('inventario/create', [InventarioController::class, 'create'])->name('inventario.create')->middleware(['auth']);
Route::post('inventario/store', [InventarioController::class, 'store'])->name('inventario.store')->middleware(['auth']);
Route::get('inventario/{inventario}/edit', [InventarioController::class, 'edit'])->name('inventario.edit')->middleware(['auth']);
Route::put('inventario/update/{inventario}', [InventarioController::class, 'update'])->name('inventario.update')->middleware(['auth']);
Route::get('inventario/show/{inventario}', [InventarioController::class, 'show'])->name('inventario.show')->middleware(['auth']);
//Logs
Route::get('logs', [LogController::class, 'index'])->name('logs.index')->middleware(['auth']);
Route::get('logs/create', [LogController::class, 'create'])->name('logs.create')->middleware(['auth']);
Route::post('logs/store', [LogController::class, 'store'])->name('logs.store')->middleware(['auth']);
Route::get('logs/{log}/edit', [LogController::class, 'edit'])->name('logs.edit')->middleware(['auth']);
Route::put('logs/update/{log}', [LogController::class, 'update'])->name('logs.update')->middleware(['auth']);
Route::get('logs/show/{log}', [LogController::class, 'show'])->name('logs.show')->middleware(['auth']);
//Matriculas
Route::get('matriculas', [MatriculaController::class, 'index'])->name('matriculas.index')->middleware(['auth']);
Route::get('matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create')->middleware(['auth']);
Route::post('matriculas/store', [MatriculaController::class, 'store'])->name('matriculas.store')->middleware(['auth']);
Route::get('matriculas/{matricula}/edit', [MatriculaController::class, 'edit'])->name('matriculas.edit')->middleware(['auth']);
Route::put('matriculas/update/{matricula}', [MatriculaController::class, 'update'])->name('matriculas.update')->middleware(['auth']);
Route::get('matriculas/show/{matricula}', [MatriculaController::class, 'show'])->name('matriculas.show')->middleware(['auth']);
//Periodoscalificaciones
Route::get('periodoscalificaciones', [PeriodocalificacionController::class, 'index'])->name('periodoscalificaciones.index')->middleware(['auth']);
Route::get('periodoscalificaciones/create', [PeriodocalificacionController::class, 'create'])->name('periodoscalificaciones.create')->middleware(['auth']);
Route::post('periodoscalificaciones/store', [PeriodocalificacionController::class, 'store'])->name('periodoscalificaciones.store')->middleware(['auth']);
Route::get('periodoscalificaciones/{periodoscalificacione}/edit', [PeriodocalificacionController::class, 'edit'])->name('periodoscalificaciones.edit')->middleware(['auth']);
Route::put('periodoscalificaciones/update/{periodoscalificacione}', [PeriodocalificacionController::class, 'update'])->name('periodoscalificaciones.update')->middleware(['auth']);
Route::get('periodoscalificaciones/show/{periodoscalificacione}', [PeriodocalificacionController::class, 'show'])->name('periodoscalificaciones.show')->middleware(['auth']);
//Permisos
Route::get('permisos', [PermisoController::class, 'index'])->name('permisos.index')->middleware(['auth']);
Route::get('permisos/create', [PermisoController::class, 'create'])->name('permisos.create')->middleware(['auth']);
Route::post('permisos/store', [PermisoController::class, 'store'])->name('permisos.store')->middleware(['auth']);
Route::get('permisos/{permiso}/edit', [PermisoController::class, 'edit'])->name('permisos.edit')->middleware(['auth']);
Route::put('permisos/update/{permiso}', [PermisoController::class, 'update'])->name('permisos.update')->middleware(['auth']);
Route::get('permisos/show/{permiso}', [PermisoController::class, 'show'])->name('permisos.show')->middleware(['auth']);
//Personales
Route::get('personales', [PersonalController::class, 'index'])->name('personales.index')->middleware(['auth']);
Route::get('personales/create', [PersonalController::class, 'create'])->name('personales.create')->middleware(['auth']);
Route::post('personales/store', [PersonalController::class, 'store'])->name('personales.store')->middleware(['auth']);
Route::get('personales/{personale}/edit', [PersonalController::class, 'edit'])->name('personales.edit')->middleware(['auth']);
Route::put('personales/update/{personale}', [PersonalController::class, 'update'])->name('personales.update')->middleware(['auth']);
Route::get('personales/show/{personale}', [PersonalController::class, 'show'])->name('personales.show')->middleware(['auth']);
//Plazosmatriculas
Route::get('plazosmatriculas', [PlazomatriculaController::class, 'index'])->name('plazosmatriculas.index')->middleware(['auth']);
Route::get('plazosmatriculas/create', [PlazomatriculaController::class, 'create'])->name('plazosmatriculas.create')->middleware(['auth']);
Route::post('plazosmatriculas/store', [PlazomatriculaController::class, 'store'])->name('plazosmatriculas.store')->middleware(['auth']);
Route::get('plazosmatriculas/{plazosmatricula}/edit', [PlazomatriculaController::class, 'edit'])->name('plazosmatriculas.edit')->middleware(['auth']);
Route::put('plazosmatriculas/update/{plazosmatricula}', [PlazomatriculaController::class, 'update'])->name('plazosmatriculas.update')->middleware(['auth']);
Route::get('plazosmatriculas/show/{plazosmatricula}', [PlazomatriculaController::class, 'show'])->name('plazosmatriculas.show')->middleware(['auth']);
//Plazosprescripciones
Route::get('plazosprescripciones', [PlazoprescripcionController::class, 'index'])->name('plazosprescripciones.index')->middleware(['auth']);
Route::get('plazosprescripciones/create', [PlazoprescripcionController::class, 'create'])->name('plazosprescripciones.create')->middleware(['auth']);
Route::post('plazosprescripciones/store', [PlazoprescripcionController::class, 'store'])->name('plazosprescripciones.store')->middleware(['auth']);
Route::get('plazosprescripciones/{plazosprescripcione}/edit', [PlazoprescripcionController::class, 'edit'])->name('plazosprescripciones.edit')->middleware(['auth']);
Route::put('plazosprescripciones/update/{plazosprescripcione}', [PlazoprescripcionController::class, 'update'])->name('plazosprescripciones.update')->middleware(['auth']);
Route::get('plazosprescripciones/show/{plazosprescripcione}', [PlazoprescripcionController::class, 'show'])->name('plazosprescripciones.show')->middleware(['auth']);
//Preferenciashorarios
Route::get('preferenciashorarios', [PreferenciahorarioController::class, 'index'])->name('preferenciashorarios.index')->middleware(['auth']);
Route::get('preferenciashorarios/create', [PreferenciahorarioController::class, 'create'])->name('preferenciashorarios.create')->middleware(['auth']);
Route::post('preferenciashorarios/store', [PreferenciahorarioController::class, 'store'])->name('preferenciashorarios.store')->middleware(['auth']);
Route::get('preferenciashorarios/{preferenciashorario}/edit', [PreferenciahorarioController::class, 'edit'])->name('preferenciashorarios.edit')->middleware(['auth']);
Route::put('preferenciashorarios/update/{preferenciashorario}', [PreferenciahorarioController::class, 'update'])->name('preferenciashorarios.update')->middleware(['auth']);
Route::get('preferenciashorarios/show/{preferenciashorario}', [PreferenciahorarioController::class, 'show'])->name('preferenciashorarios.show')->middleware(['auth']);
//Prescripciones
Route::get('prescripciones', [PrescripcionController::class, 'index'])->name('prescripciones.index')->middleware(['auth']);
Route::get('prescripciones/create', [PrescripcionController::class, 'create'])->name('prescripciones.create')->middleware(['auth']);
Route::post('prescripciones/store', [PrescripcionController::class, 'store'])->name('prescripciones.store')->middleware(['auth']);
Route::get('prescripciones/{prescripcione}/edit', [PrescripcionController::class, 'edit'])->name('prescripciones.edit')->middleware(['auth']);
Route::put('prescripciones/update/{prescripcione}', [PrescripcionController::class, 'update'])->name('prescripciones.update')->middleware(['auth']);
Route::get('prescripciones/show/{prescripcione}', [PrescripcionController::class, 'show'])->name('prescripciones.show')->middleware(['auth']);
//Prestamos
Route::get('prestamos', [PrestamoController::class, 'index'])->name('prestamos.index')->middleware(['auth']);
Route::get('prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create')->middleware(['auth']);
Route::post('prestamos/store', [PrestamoController::class, 'store'])->name('prestamos.store')->middleware(['auth']);
Route::get('prestamos/{prestamo}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit')->middleware(['auth']);
Route::put('prestamos/update/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update')->middleware(['auth']);
Route::get('prestamos/show/{prestamo}', [PrestamoController::class, 'show'])->name('prestamos.show')->middleware(['auth']);
//Profesores
Route::get('profesores', [ProfesorController::class, 'index'])->name('profesores.index')->middleware(['auth']);
Route::get('profesores/create', [ProfesorController::class, 'create'])->name('profesores.create')->middleware(['auth']);
Route::post('profesores/store', [ProfesorController::class, 'store'])->name('profesores.store')->middleware(['auth']);
Route::get('profesores/{profesore}/edit', [ProfesorController::class, 'edit'])->name('profesores.edit')->middleware(['auth']);
Route::put('profesores/update/{profesore}', [ProfesorController::class, 'update'])->name('profesores.update')->middleware(['auth']);
Route::get('profesores/show/{profesore}', [ProfesorController::class, 'show'])->name('profesores.show')->middleware(['auth']);
//Reservasespacios
Route::get('reservasespacios', [ReservaespacioController::class, 'index'])->name('reservasespacios.index')->middleware(['auth']);
Route::get('reservasespacios/create', [ReservaespacioController::class, 'create'])->name('reservasespacios.create')->middleware(['auth']);
Route::post('reservasespacios/store', [ReservaespacioController::class, 'store'])->name('reservasespacios.store')->middleware(['auth']);
Route::get('reservasespacios/{reservasespacio}/edit', [ReservaespacioController::class, 'edit'])->name('reservasespacios.edit')->middleware(['auth']);
Route::put('reservasespacios/update/{reservasespacio}', [ReservaespacioController::class, 'update'])->name('reservasespacios.update')->middleware(['auth']);
Route::get('reservasespacios/show/{reservasespacio}', [ReservaespacioController::class, 'show'])->name('reservasespacios.show')->middleware(['auth']);
//Roles
Route::get('roles', [RolController::class, 'index'])->name('roles.index')->middleware(['auth']);
Route::get('roles/create', [RolController::class, 'create'])->name('roles.create')->middleware(['auth']);
Route::post('roles/store', [RolController::class, 'store'])->name('roles.store')->middleware(['auth']);
Route::get('roles/{role}/edit', [RolController::class, 'edit'])->name('roles.edit')->middleware(['auth']);
Route::put('roles/update/{role}', [RolController::class, 'update'])->name('roles.update')->middleware(['auth']);
Route::get('roles/show/{role}', [RolController::class, 'show'])->name('roles.show')->middleware(['auth']);
//Salarios
Route::get('salarios', [SalarioController::class, 'index'])->name('salarios.index')->middleware(['auth']);
Route::get('salarios/create', [SalarioController::class, 'create'])->name('salarios.create')->middleware(['auth']);
Route::post('salarios/store', [SalarioController::class, 'store'])->name('salarios.store')->middleware(['auth']);
Route::get('salarios/{salario}/edit', [SalarioController::class, 'edit'])->name('salarios.edit')->middleware(['auth']);
Route::put('salarios/update/{salario}', [SalarioController::class, 'update'])->name('salarios.update')->middleware(['auth']);
Route::get('salarios/show/{salario}', [SalarioController::class, 'show'])->name('salarios.show')->middleware(['auth']);
//Titulaciones
Route::get('titulaciones', [TitulacionController::class, 'index'])->name('titulaciones.index')->middleware(['auth']);
Route::get('titulaciones/create', [TitulacionController::class, 'create'])->name('titulaciones.create')->middleware(['auth']);
Route::post('titulaciones/store', [TitulacionController::class, 'store'])->name('titulaciones.store')->middleware(['auth']);
Route::get('titulaciones/{titulacione}/edit', [TitulacionController::class, 'edit'])->name('titulaciones.edit')->middleware(['auth']);
Route::put('titulaciones/update/{titulacione}', [TitulacionController::class, 'update'])->name('titulaciones.update')->middleware(['auth']);
Route::get('titulaciones/show/{titulacione}', [TitulacionController::class, 'show'])->name('titulaciones.show')->middleware(['auth']);
//RolesPermisos
Route::get('rolespermisos', [RolespermisoController::class, 'index'])->name('rolespermisos.index')->middleware(['auth']);
Route::get('rolespermisos/create', [RolespermisoController::class, 'create'])->name('rolespermisos.create')->middleware(['auth']);
Route::post('rolespermisos/store', [RolespermisoController::class, 'store'])->name('rolespermisos.store')->middleware(['auth']);
Route::get('rolespermisos/{rolespermiso}/edit', [RolespermisoController::class, 'edit'])->name('rolespermisos.edit')->middleware(['auth']);
Route::put('rolespermisos/update/{rolespermiso}', [RolespermisoController::class, 'update'])->name('rolespermisos.update')->middleware(['auth']);
Route::get('rolespermisos/show/{rolespermiso}', [RolespermisoController::class, 'show'])->name('rolespermisos.show')->middleware(['auth']);


// Route::resource('espacios', EspacioController::class)->middleware(['auth']);
// Route::resource('grupos', GrupoController::class)->middleware(['auth']);
// Route::resource('facturaciones', FacturacionController::class)->middleware(['auth']);
// Route::resource('comunicaciones', ComunicacionController::class)->middleware(['auth']);
// Route::resource('destinatarios', DestinatarioController::class)->middleware(['auth']);
// Route::resource('actividades', ActividadController::class)->middleware(['auth']);
// Route::resource('alumnos', AlumnoController::class);
// Route::resource('tutores', TutorController::class);
// Route::resource('asistencias', AsistenciaController::class)->middleware(['auth']);
// Route::resource('calificaciones', CalificacionController::class)->middleware(['auth']);
// Route::resource('categorias', CategoriaController::class)->middleware(['auth']);
// Route::resource('inventario', InventarioController::class)->middleware(['auth']);
// Route::resource('logs', LogController::class)->middleware(['auth']);
// Route::resource('matriculas', MatriculaController::class)->middleware(['auth']);
// Route::resource('periodoscalificaciones', PeriodocalificacionController::class)->middleware(['auth']);
// Route::resource('permisos', PermisoController::class)->middleware(['auth']);
// Route::resource('personales', PersonalController::class)->middleware(['auth']);
// Route::resource('plazosmatriculas', PlazomatriculaController::class)->middleware(['auth']);
// Route::resource('plazosprescripciones', PlazoprescripcionController::class)->middleware(['auth']);
// Route::resource('preferenciashorarios', PreferenciahorarioController::class)->middleware(['auth']);
// Route::resource('prescripciones', PrescripcionController::class)->middleware(['auth']);
// Route::resource('prestamos', PrestamoController::class)->middleware(['auth']);
// Route::resource('profesores', ProfesorController::class)->middleware(['auth']);
// Route::resource('reservasespacios', ReservaespacioController::class)->middleware(['auth']);
// Route::resource('roles', RolController::class)->middleware(['auth']);
// Route::resource('salarios', SalarioController::class)->middleware(['auth']);
// Route::resource('titulaciones', TitulacionController::class)->middleware(['auth']);

//Selección de plazo para matricular alumno
Route::post('plazomatricula', [PlazomatriculaController::class, 'plazomatricula'])->name('plazosmatriculas.plazomatricula');

//Selección de plazo para preinscribir alumno
Route::post('plazoprescripcion', [PlazoprescripcionController::class, 'plazoprescripcion'])->name('plazosprescripciones.plazoprescripcion');
//Calificar grupo
Route::post('calificargrupo', [CalificacionController::class, 'calificarGrupo'])->name('calificaciones.calificar-grupo');
Route::post('asignarasistencia', [AsistenciaController::class, 'pasarListaGrupo'])->name('asistencia.pasarlista');

Route::get('verlistaasistencia/{alumno}', [AsistenciaController::class, 'verasistencias'])->name('asistencia.verlista');

Route::get('justificarfalta/{asistencia}', [AsistenciaController::class, 'justificarFalta'])->name('asistencia.justificar');

Route::get('alumnos/vista', [AlumnoController::class, 'vista'])->name('alumnos.vista');
Route::get('matriculas/matriculas_alumno', [MatriculaController::class, 'matriculas_alumno'])->name('matriculas.matriculas_alumno');
Route::get('prescripciones/prescripciones_alumno', [PrescripcionController::class, 'prescripciones_alumno'])->name('prescripciones.prescripciones_alumno');

Route::get('ver_actividades/', [ProfesorController::class, 'ver_actividades'])->name('profesores.ver_actividades');