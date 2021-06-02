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

Route::get('espacios', [EspacioController::class, 'index'])->name('espacios.index')->middleware(['auth', 'permiso:verEspacios']);
Route::get('espacios/create', [EspacioController::class, 'create'])->name('espacios.create')->middleware(['auth', 'permiso:crearEspacio']);
Route::post('espacios/store/', [EspacioController::class, 'store'])->name('espacios.store')->middleware(['auth', 'permiso:crearEspacio']);
Route::get('espacios/{espacio}/edit', [EspacioController::class, 'edit'])->name('espacios.edit')->middleware(['auth', 'permiso:editarEspacio']);
Route::put('espacios/update/{espacio}', [EspacioController::class, 'update'])->name('espacios.update')->middleware(['auth', 'permiso:editarEspacio']);
Route::get('espacios/show/{espacio}', [EspacioController::class, 'show'])->name('espacios.show')->middleware(['auth', 'permiso:verEspacio']);
//Grupos
Route::get('grupos', [GrupoController::class, 'index'])->name('grupos.index')->middleware(['auth', 'permiso:verGrupos']);
Route::get('grupos/create', [GrupoController::class, 'create'])->name('grupos.create')->middleware(['auth', 'permiso:crearGrupo']);
Route::post('grupos/store', [GrupoController::class, 'store'])->name('grupos.store')->middleware(['auth', 'permiso:crearGrupo']);
Route::get('grupos/{grupo}/edit', [GrupoController::class, 'edit'])->name('grupos.edit')->middleware(['auth', 'permiso:editarGrupo']);
Route::put('grupos/update/{grupo}', [GrupoController::class, 'update'])->name('grupos.update')->middleware(['auth', 'permiso:editarGrupo']);
Route::get('grupos/show/{grupo}', [GrupoController::class, 'show'])->name('grupos.show')->middleware(['auth', 'permiso:verGrupo']);
//Facturaciones
Route::get('facturaciones', [FacturacionController::class, 'index'])->name('facturaciones.index')->middleware(['auth', 'permiso:verFacturaciones']);
Route::get('facturaciones/create', [FacturacionController::class, 'create'])->name('facturaciones.create')->middleware(['auth', 'permiso:crearFacturacion']);
Route::post('facturaciones/store', [FacturacionController::class, 'store'])->name('facturaciones.store')->middleware(['auth', 'permiso:crearFacturacion']);
Route::get('facturaciones/{facturacione}/edit', [FacturacionController::class, 'edit'])->name('facturaciones.edit')->middleware(['auth', 'permiso:editarFacturacion']);
Route::put('facturaciones/update/{facturacione}', [FacturacionController::class, 'update'])->name('facturaciones.update')->middleware(['auth', 'permiso:editarFacturacion']);
Route::get('facturaciones/show/{facturacione}', [FacturacionController::class, 'show'])->name('facturaciones.show')->middleware(['auth', 'permiso:verFacturacion']);
//Comunicaciones
Route::get('comunicaciones', [ComunicacionController::class, 'index'])->name('comunicaciones.index')->middleware(['auth', 'permiso:verComunicaciones']);
Route::get('comunicaciones/create', [ComunicacionController::class, 'create'])->name('comunicaciones.create')->middleware(['auth', 'permiso:crearComunicacion']);
Route::post('comunicaciones/store', [ComunicacionController::class, 'store'])->name('comunicaciones.store')->middleware(['auth', 'permiso:crearComunicacion']);
Route::get('comunicaciones/{comunicacione}/edit', [ComunicacionController::class, 'edit'])->name('comunicaciones.edit')->middleware(['auth', 'permiso:editarComunicacion']);
Route::put('comunicaciones/update/{comunicacione}', [ComunicacionController::class, 'update'])->name('comunicaciones.update')->middleware(['auth', 'permiso:editarComunicacion']);
Route::get('comunicaciones/show/{comunicacione}', [ComunicacionController::class, 'show'])->name('comunicaciones.show')->middleware(['auth', 'permiso:verComunicacion']);
//Destinatarios
Route::get('destinatarios', [DestinatarioController::class, 'index'])->name('destinatarios.index')->middleware(['auth', 'permiso:verDestinatarios']);
Route::get('destinatarios/create', [DestinatarioController::class, 'create'])->name('destinatarios.create')->middleware(['auth', 'permiso:crearDestinatario']);
Route::post('destinatarios/store', [DestinatarioController::class, 'store'])->name('destinatarios.store')->middleware(['auth', 'permiso:crearDestinatario']);
Route::get('destinatarios/{destinatario}/edit', [DestinatarioController::class, 'edit'])->name('destinatarios.edit')->middleware(['auth', 'permiso:editarDestinatario']);
Route::put('destinatarios/update/{destinatario}', [DestinatarioController::class, 'update'])->name('destinatarios.update')->middleware(['auth', 'permiso:editarDestinatario']);
Route::get('destinatarios/show/{destinatario}', [DestinatarioController::class, 'show'])->name('destinatarios.show')->middleware(['auth', 'permiso:verDestinatario']);
//Actividades
Route::get('actividades', [ActividadController::class, 'index'])->name('actividades.index')->middleware(['auth', 'permiso:verActividades']);
Route::get('actividades/create', [ActividadController::class, 'create'])->name('actividades.create')->middleware(['auth', 'permiso:crearActividad']);
Route::post('actividades/store', [ActividadController::class, 'store'])->name('actividades.store')->middleware(['auth', 'permiso:crearActividad']);
Route::get('actividades/{actividade}/edit', [ActividadController::class, 'edit'])->name('actividades.edit')->middleware(['auth', 'permiso:editarActividad']);
Route::put('actividades/update/{actividade}', [ActividadController::class, 'update'])->name('actividades.update')->middleware(['auth', 'permiso:editarActividad']);
Route::get('actividades/show/{actividade}', [ActividadController::class, 'show'])->name('actividades.show')->middleware(['auth', 'permiso:verActividad']);
//Alumnos
Route::get('alumnos', [AlumnoController::class, 'index'])->name('alumnos.index')->middleware(['auth', 'permiso:verAlumnos']);
Route::get('alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create')->middleware(['auth', 'permiso:crearAlumno']);
Route::post('alumnos/store', [AlumnoController::class, 'store'])->name('alumnos.store')->middleware(['auth', 'permiso:crearAlumno']);
Route::get('alumnos/{alumno}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit')->middleware(['auth', 'permiso:editarAlumno']);
Route::put('alumnos/update/{alumno}', [AlumnoController::class, 'update'])->name('alumnos.update')->middleware(['auth', 'permiso:editarAlumno']);
Route::get('alumnos/show/{alumno}', [AlumnoController::class, 'show'])->name('alumnos.show')->middleware(['auth', 'permiso:verAlumno']);
Route::get('alumnos/ver_actividades', [AlumnoController::class, 'ver_actividades'])->name('alumnos.ver_actividades');
//Tutores
Route::get('tutores', [TutorController::class, 'index'])->name('tutores.index')->middleware(['auth', 'permiso:verTutores']);
Route::get('tutores/create', [TutorController::class, 'create'])->name('tutores.create')->middleware(['auth', 'permiso:crearTutor']);
Route::post('tutores/store', [TutorController::class, 'store'])->name('tutores.store')->middleware(['auth', 'permiso:crearTutor']);
Route::get('tutores/{tutore}/edit', [TutorController::class, 'edit'])->name('tutores.edit')->middleware(['auth', 'permiso:editarTutor']);
Route::put('tutores/update/{tutore}', [TutorController::class, 'update'])->name('tutores.update')->middleware(['auth', 'permiso:editarTutor']);
Route::get('tutores/show/{tutore}', [TutorController::class, 'show'])->name('tutores.show')->middleware(['auth', 'permiso:verTutor']);
//Asistencias
Route::get('asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index')->middleware(['auth', 'permiso:verAsistencias']);
Route::get('asistencias/create', [AsistenciaController::class, 'create'])->name('asistencias.create')->middleware(['auth', 'permiso:crearAsistencia']);
Route::post('asistencias/store', [AsistenciaController::class, 'store'])->name('asistencias.store')->middleware(['auth', 'permiso:crearAsistencia']);
Route::get('asistencias/{asistencia}/edit', [AsistenciaController::class, 'edit'])->name('asistencias.edit')->middleware(['auth', 'permiso:editarAsistencia']);
Route::put('asistencias/update/{asistencia}', [AsistenciaController::class, 'update'])->name('asistencias.update')->middleware(['auth', 'permiso:editarAsistencia']);
Route::get('asistencias/show/{asistencia}', [AsistenciaController::class, 'show'])->name('asistencias.show')->middleware(['auth', 'permiso:verAsistencia']);
//Calificaciones
Route::get('calificaciones', [CalificacionController::class, 'index'])->name('calificaciones.index')->middleware(['auth', 'permiso:verCalificaciones']);
Route::get('calificaciones/create', [CalificacionController::class, 'create'])->name('calificaciones.create')->middleware(['auth', 'permiso:crearCalificacion']);
Route::post('calificaciones/store', [CalificacionController::class, 'store'])->name('calificaciones.store')->middleware(['auth', 'permiso:crearCalificacion']);
Route::get('calificaciones/{calificacione}/edit', [CalificacionController::class, 'edit'])->name('calificaciones.edit')->middleware(['auth', 'permiso:editarCalificacion']);
Route::put('calificaciones/update/{calificacione}', [CalificacionController::class, 'update'])->name('calificaciones.update')->middleware(['auth', 'permiso:editarCalificacion']);
Route::get('calificaciones/show/{calificacione}', [CalificacionController::class, 'show'])->name('calificaciones.show')->middleware(['auth', 'permiso:verCalificacion']);
//Categorias
Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index')->middleware(['auth', 'permiso:verCategorias']);
Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categorias.create')->middleware(['auth', 'permiso:crearCategoria']);
Route::post('categorias/store', [CategoriaController::class, 'store'])->name('categorias.store')->middleware(['auth', 'permiso:crearCategoria']);
Route::get('categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit')->middleware(['auth', 'permiso:editarCategoria']);
Route::put('categorias/update/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update')->middleware(['auth', 'permiso:editarCategoria']);
Route::get('categorias/show/{categoria}', [CategoriaController::class, 'show'])->name('categorias.show')->middleware(['auth', 'permiso:verCategoria']);
//Inventario
Route::get('inventario', [InventarioController::class, 'index'])->name('inventario.index')->middleware(['auth', 'permiso:verInventario']);
Route::get('inventario/create', [InventarioController::class, 'create'])->name('inventario.create')->middleware(['auth', 'permiso:crearInventario']);
Route::post('inventario/store', [InventarioController::class, 'store'])->name('inventario.store')->middleware(['auth', 'permiso:crearInventario']);
Route::get('inventario/{inventario}/edit', [InventarioController::class, 'edit'])->name('inventario.edit')->middleware(['auth', 'permiso:editarInventario']);
Route::put('inventario/update/{inventario}', [InventarioController::class, 'update'])->name('inventario.update')->middleware(['auth', 'permiso:editarInventario']);
Route::get('inventario/show/{inventario}', [InventarioController::class, 'show'])->name('inventario.show')->middleware(['auth', 'permiso:verInventario']);
//Logs
Route::get('logs', [LogController::class, 'index'])->name('logs.index')->middleware(['auth', 'permiso:verLogs']);
Route::get('logs/create', [LogController::class, 'create'])->name('logs.create')->middleware(['auth', 'permiso:crearLog']);
Route::post('logs/store', [LogController::class, 'store'])->name('logs.store')->middleware(['auth', 'permiso:crearLog']);
Route::get('logs/{log}/edit', [LogController::class, 'edit'])->name('logs.edit')->middleware(['auth', 'permiso:editarLog']);
Route::put('logs/update/{log}', [LogController::class, 'update'])->name('logs.update')->middleware(['auth', 'permiso:editarLog']);
Route::get('logs/show/{log}', [LogController::class, 'show'])->name('logs.show')->middleware(['auth', 'permiso:verLog']);
//Matriculas
Route::get('matriculas', [MatriculaController::class, 'index'])->name('matriculas.index')->middleware(['auth', 'permiso:verMatriculas']);
Route::get('matriculas/create', [MatriculaController::class, 'create'])->name('matriculas.create')->middleware(['auth', 'permiso:crearMatricula']);
Route::post('matriculas/store', [MatriculaController::class, 'store'])->name('matriculas.store')->middleware(['auth', 'permiso:crearMatricula']);
Route::get('matriculas/{matricula}/edit', [MatriculaController::class, 'edit'])->name('matriculas.edit')->middleware(['auth', 'permiso:editarMatricula']);
Route::put('matriculas/update/{matricula}', [MatriculaController::class, 'update'])->name('matriculas.update')->middleware(['auth', 'permiso:editarMatricula']);
Route::get('matriculas/show/{matricula}', [MatriculaController::class, 'show'])->name('matriculas.show')->middleware(['auth', 'permiso:verMatricula']);
//Periodoscalificaciones
Route::get('periodoscalificaciones', [PeriodocalificacionController::class, 'index'])->name('periodoscalificaciones.index')->middleware(['auth', 'permiso:verPeriodoscalificaciones']);
Route::get('periodoscalificaciones/create', [PeriodocalificacionController::class, 'create'])->name('periodoscalificaciones.create')->middleware(['auth', 'permiso:crearPeriodocalificacion']);
Route::post('periodoscalificaciones/store', [PeriodocalificacionController::class, 'store'])->name('periodoscalificaciones.store')->middleware(['auth', 'permiso:crearPeriodocalificacion']);
Route::get('periodoscalificaciones/{periodoscalificacione}/edit', [PeriodocalificacionController::class, 'edit'])->name('periodoscalificaciones.edit')->middleware(['auth', 'permiso:editarPeriodocalificacion']);
Route::put('periodoscalificaciones/update/{periodoscalificacione}', [PeriodocalificacionController::class, 'update'])->name('periodoscalificaciones.update')->middleware(['auth', 'permiso:editarPeriodocalificacion']);
Route::get('periodoscalificaciones/show/{periodoscalificacione}', [PeriodocalificacionController::class, 'show'])->name('periodoscalificaciones.show')->middleware(['auth', 'permiso:verPeriodocalificacion']);
//Permisos
Route::get('permisos', [PermisoController::class, 'index'])->name('permisos.index')->middleware(['auth', 'permiso:verPermisos']);
Route::get('permisos/create', [PermisoController::class, 'create'])->name('permisos.create')->middleware(['auth', 'permiso:crearPermiso']);
Route::post('permisos/store', [PermisoController::class, 'store'])->name('permisos.store')->middleware(['auth', 'permiso:crearPermiso']);
Route::get('permisos/{permiso}/edit', [PermisoController::class, 'edit'])->name('permisos.edit')->middleware(['auth', 'permiso:editarPermiso']);
Route::put('permisos/update/{permiso}', [PermisoController::class, 'update'])->name('permisos.update')->middleware(['auth', 'permiso:editarPermiso']);
Route::get('permisos/show/{permiso}', [PermisoController::class, 'show'])->name('permisos.show')->middleware(['auth', 'permiso:verPermiso']);
//Personales
Route::get('personales', [PersonalController::class, 'index'])->name('personales.index')->middleware(['auth', 'permiso:verPersonales']);
Route::get('personales/create', [PersonalController::class, 'create'])->name('personales.create')->middleware(['auth', 'permiso:crearPersonal']);
Route::post('personales/store', [PersonalController::class, 'store'])->name('personales.store')->middleware(['auth', 'permiso:crearPersonal']);
Route::get('personales/{personale}/edit', [PersonalController::class, 'edit'])->name('personales.edit')->middleware(['auth', 'permiso:editarPersonal']);
Route::put('personales/update/{personale}', [PersonalController::class, 'update'])->name('personales.update')->middleware(['auth', 'permiso:editarPersonal']);
Route::get('personales/show/{personale}', [PersonalController::class, 'show'])->name('personales.show')->middleware(['auth', 'permiso:verPersonal']);
//Plazosmatriculas
Route::get('plazosmatriculas', [PlazomatriculaController::class, 'index'])->name('plazosmatriculas.index')->middleware(['auth', 'permiso:verPlazosmatriculas']);
Route::get('plazosmatriculas/create', [PlazomatriculaController::class, 'create'])->name('plazosmatriculas.create')->middleware(['auth', 'permiso:crearPlazomatricula']);
Route::post('plazosmatriculas/store', [PlazomatriculaController::class, 'store'])->name('plazosmatriculas.store')->middleware(['auth', 'permiso:crearPlazomatricula']);
Route::get('plazosmatriculas/{plazosmatricula}/edit', [PlazomatriculaController::class, 'edit'])->name('plazosmatriculas.edit')->middleware(['auth', 'permiso:editarPlazomatricula']);
Route::put('plazosmatriculas/update/{plazosmatricula}', [PlazomatriculaController::class, 'update'])->name('plazosmatriculas.update')->middleware(['auth', 'permiso:editarPlazomatricula']);
Route::get('plazosmatriculas/show/{plazosmatricula}', [PlazomatriculaController::class, 'show'])->name('plazosmatriculas.show')->middleware(['auth', 'permiso:verPlazomatricula']);
//Plazosprescripciones
Route::get('plazosprescripciones', [PlazoprescripcionController::class, 'index'])->name('plazosprescripciones.index')->middleware(['auth', 'permiso:verPlazosprescripciones']);
Route::get('plazosprescripciones/create', [PlazoprescripcionController::class, 'create'])->name('plazosprescripciones.create')->middleware(['auth', 'permiso:crearPlazoprescripcion']);
Route::post('plazosprescripciones/store', [PlazoprescripcionController::class, 'store'])->name('plazosprescripciones.store')->middleware(['auth', 'permiso:crearPlazoprescripcion']);
Route::get('plazosprescripciones/{plazosprescripcione}/edit', [PlazoprescripcionController::class, 'edit'])->name('plazosprescripciones.edit')->middleware(['auth', 'permiso:editarPlazoprescripcion']);
Route::put('plazosprescripciones/update/{plazosprescripcione}', [PlazoprescripcionController::class, 'update'])->name('plazosprescripciones.update')->middleware(['auth', 'permiso:editarPlazoprescripcion']);
Route::get('plazosprescripciones/show/{plazosprescripcione}', [PlazoprescripcionController::class, 'show'])->name('plazosprescripciones.show')->middleware(['auth', 'permiso:verPlazoprescripcion']);
//Preferenciashorarios
Route::get('preferenciashorarios', [PreferenciahorarioController::class, 'index'])->name('preferenciashorarios.index')->middleware(['auth', 'permiso:verPreferenciashorarios']);
Route::get('preferenciashorarios/create', [PreferenciahorarioController::class, 'create'])->name('preferenciashorarios.create')->middleware(['auth', 'permiso:crearPreferenciahorario']);
Route::post('preferenciashorarios/store', [PreferenciahorarioController::class, 'store'])->name('preferenciashorarios.store')->middleware(['auth', 'permiso:crearPreferenciahorario']);
Route::get('preferenciashorarios/{preferenciashorario}/edit', [PreferenciahorarioController::class, 'edit'])->name('preferenciashorarios.edit')->middleware(['auth', 'permiso:editarPreferenciahorario']);
Route::put('preferenciashorarios/update/{preferenciashorario}', [PreferenciahorarioController::class, 'update'])->name('preferenciashorarios.update')->middleware(['auth', 'permiso:editarPreferenciahorario']);
Route::get('preferenciashorarios/show/{preferenciashorario}', [PreferenciahorarioController::class, 'show'])->name('preferenciashorarios.show')->middleware(['auth', 'permiso:verPreferenciahorario']);
//Prescripciones
Route::get('prescripciones', [PrescripcionController::class, 'index'])->name('prescripciones.index')->middleware(['auth', 'permiso:verPrescripciones']);
Route::get('prescripciones/create', [PrescripcionController::class, 'create'])->name('prescripciones.create')->middleware(['auth', 'permiso:crearPrescripcion']);
Route::post('prescripciones/store', [PrescripcionController::class, 'store'])->name('prescripciones.store')->middleware(['auth', 'permiso:crearPrescripcion']);
Route::get('prescripciones/{prescripcione}/edit', [PrescripcionController::class, 'edit'])->name('prescripciones.edit')->middleware(['auth', 'permiso:editarPrescripcion']);
Route::put('prescripciones/update/{prescripcione}', [PrescripcionController::class, 'update'])->name('prescripciones.update')->middleware(['auth', 'permiso:editarPrescripcion']);
Route::get('prescripciones/show/{prescripcione}', [PrescripcionController::class, 'show'])->name('prescripciones.show')->middleware(['auth', 'permiso:verPrescripcion']);
//Prestamos
Route::get('prestamos', [PrestamoController::class, 'index'])->name('prestamos.index')->middleware(['auth', 'permiso:verPrestamos']);
Route::get('prestamos/create', [PrestamoController::class, 'create'])->name('prestamos.create')->middleware(['auth', 'permiso:crearPrestamo']);
Route::post('prestamos/store', [PrestamoController::class, 'store'])->name('prestamos.store')->middleware(['auth', 'permiso:crearPrestamo']);
Route::get('prestamos/{prestamo}/edit', [PrestamoController::class, 'edit'])->name('prestamos.edit')->middleware(['auth', 'permiso:editarPrestamo']);
Route::put('prestamos/update/{prestamo}', [PrestamoController::class, 'update'])->name('prestamos.update')->middleware(['auth', 'permiso:editarPrestamo']);
Route::get('prestamos/show/{prestamo}', [PrestamoController::class, 'show'])->name('prestamos.show')->middleware(['auth', 'permiso:verPrestamo']);
//Profesores
Route::get('profesores', [ProfesorController::class, 'index'])->name('profesores.index')->middleware(['auth', 'permiso:verProfesores']);
Route::get('profesores/create', [ProfesorController::class, 'create'])->name('profesores.create')->middleware(['auth', 'permiso:crearProfesor']);
Route::post('profesores/store', [ProfesorController::class, 'store'])->name('profesores.store')->middleware(['auth', 'permiso:crearProfesor']);
Route::get('profesores/{profesore}/edit', [ProfesorController::class, 'edit'])->name('profesores.edit')->middleware(['auth', 'permiso:editarProfesor']);
Route::put('profesores/update/{profesore}', [ProfesorController::class, 'update'])->name('profesores.update')->middleware(['auth', 'permiso:editarProfesor']);
Route::get('profesores/show/{profesore}', [ProfesorController::class, 'show'])->name('profesores.show')->middleware(['auth', 'permiso:verProfesor']);
Route::get('profesores/vistas', [ProfesorController::class, 'vistas'])->name('profesores.vista');
Route::get('ver_actividades/', [ProfesorController::class, 'ver_actividades'])->name('profesores.ver_actividades');
//Reservasespacios
Route::get('reservasespacios', [ReservaespacioController::class, 'index'])->name('reservasespacios.index')->middleware(['auth', 'permiso:verReservasespacios']);
Route::get('reservasespacios/create', [ReservaespacioController::class, 'create'])->name('reservasespacios.create')->middleware(['auth', 'permiso:crearReservaespacio']);
Route::post('reservasespacios/store', [ReservaespacioController::class, 'store'])->name('reservasespacios.store')->middleware(['auth', 'permiso:crearReservaespacio']);
Route::get('reservasespacios/{reservasespacio}/edit', [ReservaespacioController::class, 'edit'])->name('reservasespacios.edit')->middleware(['auth', 'permiso:editarReservaespacio']);
Route::put('reservasespacios/update/{reservasespacio}', [ReservaespacioController::class, 'update'])->name('reservasespacios.update')->middleware(['auth', 'permiso:editarReservaespacio']);
Route::get('reservasespacios/show/{reservasespacio}', [ReservaespacioController::class, 'show'])->name('reservasespacios.show')->middleware(['auth', 'permiso:verReservaespacio']);
//Roles
Route::get('roles', [RolController::class, 'index'])->name('roles.index')->middleware(['auth', 'permiso:verRoles']);
Route::get('roles/create', [RolController::class, 'create'])->name('roles.create')->middleware(['auth', 'permiso:crearRol']);
Route::post('roles/store', [RolController::class, 'store'])->name('roles.store')->middleware(['auth', 'permiso:crearRol']);
Route::get('roles/{role}/edit', [RolController::class, 'edit'])->name('roles.edit')->middleware(['auth', 'permiso:editarRol']);
Route::put('roles/update/{role}', [RolController::class, 'update'])->name('roles.update')->middleware(['auth', 'permiso:editarRol']);
Route::get('roles/show/{role}', [RolController::class, 'show'])->name('roles.show')->middleware(['auth', 'permiso:verRol']);
//Salarios
Route::get('salarios', [SalarioController::class, 'index'])->name('salarios.index')->middleware(['auth', 'permiso:verSalarios']);
Route::get('salarios/create', [SalarioController::class, 'create'])->name('salarios.create')->middleware(['auth', 'permiso:crearSalario']);
Route::post('salarios/store', [SalarioController::class, 'store'])->name('salarios.store')->middleware(['auth', 'permiso:crearSalario']);
Route::get('salarios/{salario}/edit', [SalarioController::class, 'edit'])->name('salarios.edit')->middleware(['auth', 'permiso:editarSalario']);
Route::put('salarios/update/{salario}', [SalarioController::class, 'update'])->name('salarios.update')->middleware(['auth', 'permiso:editarSalario']);
Route::get('salarios/show/{salario}', [SalarioController::class, 'show'])->name('salarios.show')->middleware(['auth', 'permiso:verSalario']);
//Titulaciones
Route::get('titulaciones', [TitulacionController::class, 'index'])->name('titulaciones.index')->middleware(['auth', 'permiso:verTitulaciones']);
Route::get('titulaciones/create', [TitulacionController::class, 'create'])->name('titulaciones.create')->middleware(['auth', 'permiso:crearTitulacion']);
Route::post('titulaciones/store', [TitulacionController::class, 'store'])->name('titulaciones.store')->middleware(['auth', 'permiso:crearTitulacion']);
Route::get('titulaciones/{titulacione}/edit', [TitulacionController::class, 'edit'])->name('titulaciones.edit')->middleware(['auth', 'permiso:editarTitulacion']);
Route::put('titulaciones/update/{titulacione}', [TitulacionController::class, 'update'])->name('titulaciones.update')->middleware(['auth', 'permiso:editarTitulacion']);
Route::get('titulaciones/show/{titulacione}', [TitulacionController::class, 'show'])->name('titulaciones.show')->middleware(['auth', 'permiso:verTitulacion']);
//RolesPermisos
Route::get('rolespermisos', [RolespermisoController::class, 'index'])->name('rolespermisos.index')->middleware(['auth', 'permiso:verRolespermisos']);
Route::get('rolespermisos/create', [RolespermisoController::class, 'create'])->name('rolespermisos.create')->middleware(['auth', 'permiso:crearRolespermiso']);
Route::post('rolespermisos/store', [RolespermisoController::class, 'store'])->name('rolespermisos.store')->middleware(['auth', 'permiso:crearRolespermiso']);
Route::get('rolespermisos/{rolespermiso}/edit', [RolespermisoController::class, 'edit'])->name('rolespermisos.edit')->middleware(['auth', 'permiso:editarRolespermiso']);
Route::put('rolespermisos/update/{rolespermiso}', [RolespermisoController::class, 'update'])->name('rolespermisos.update')->middleware(['auth', 'permiso:editarRolespermiso']);
Route::get('rolespermisos/show/{rolespermiso}', [RolespermisoController::class, 'show'])->name('rolespermisos.show')->middleware(['auth', 'permiso:verRolespermiso']);


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

Route::get('alumnos/vistas', [AlumnoController::class, 'vistas'])->name('alumnos.vista');
Route::get('matriculas/matriculas_alumno', [MatriculaController::class, 'matriculas_alumno'])->name('matriculas.matriculas_alumno');
Route::get('prescripciones/prescripciones_alumno', [PrescripcionController::class, 'prescripciones_alumno'])->name('prescripciones.prescripciones_alumno');

Route::get('rolespermiso/delete/', [RolespermisoController::class, 'delete'])->name('rolespermisos.delete');