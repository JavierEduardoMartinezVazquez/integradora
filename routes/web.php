<?php

use Illuminate\Support\Facades\Route;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('prueba', 'PruebaController@Prueba')->name('prueba');
//Route::get('/login', 'LoginController@index')->name('login');



//Route::get('Start', 'WelcomeControlles@Start')->name('Start');
Route::get('Tienda', 'TiendaController@Tienda')->name('Tienda');

/*---------------Controlador Usuarios-----------------*/
Route::get('User', 'UserController@User')->middleware('can:User')->name('User');
Route::get('obtener_ultimo_id_user', 'UserController@obtener_ultimo_id_user')->name('obtener_ultimo_id_user');
Route::get('obtener_empresa', 'UserController@obtener_empresa')->name('obtener_empresa');
Route::get('obtener_horario', 'UserController@obtener_horario')->name('obtener_horario');
Route::get('obtener_empresaid', 'UserController@obtener_empresaid')->name('obtener_empresaid');
Route::get('obtener_roles', 'UserController@obtener_roles')->name('obtener_roles');
Route::post('guardar_user', 'UserController@guardar_user')->name('guardar_user');
Route::get('listar_user', 'UserController@listar_user')->name('listar_user');
Route::get('obtener_user', 'UserController@obtener_user')->name('obtener_user');
Route::post('modificar_user', 'UserController@modificar_user')->name('modificar_user');
Route::get('verificar_baja_user', 'UserController@verificar_baja_user')->name('verificar_baja_user');
Route::post('baja_user', 'UserController@baja_user')->name('baja_user');
Route::get('credencial_pdf/{user_id}', 'UserController@credencial_pdf')->name('credencial_pdf');

/*---------------Controlador empresas-----------------*/
Route::get('Business', 'BusinessController@Business')->name('Business');
Route::get('obtener_ultimo_id_business', 'BusinessController@obtener_ultimo_id_business')->name('obtener_ultimo_id_business');
Route::post('guardar_business', 'BusinessController@guardar_business')->name('guardar_business');
Route::get('listar_business', 'BusinessController@listar_business')->name('listar_business');
Route::get('obtener_business', 'BusinessController@obtener_business')->name('obtener_business');
Route::post('modificar_business', 'BusinessController@modificar_business')->name('modificar_business');
Route::get('verificar_baja_business', 'BusinessController@verificar_baja_business')->name('verificar_baja_business');
Route::post('baja_business', 'BusinessController@baja_business')->name('baja_business');

/*---------------Controlador Ventas-----------------*/
Route::get('Ventas', 'VentasController@Ventas')->name('Ventas');
Route::get('obtener_ultimo_id_ventas', 'VentasController@obtener_ultimo_id_ventas')->name('obtener_ultimo_id_ventas');
Route::post('guardar_ventas', 'VentasController@guardar_ventas')->name('guardar_ventas');
Route::get('listar_ventas', 'VentasController@listar_ventas')->name('listar_ventas');
Route::get('obtener_ventas', 'VentasController@obtener_ventas')->name('obtener_ventas');
Route::post('modificar_ventas', 'VentasController@modificar_ventas')->name('modificar_ventas');
Route::get('verificar_baja_ventas', 'VentasController@verificar_baja_ventas')->name('verificar_baja_ventas');
Route::post('baja_ventas', 'VentasController@baja_ventas')->name('baja_ventas');

/*---------------Controlador Compras-----------------*/
Route::get('Compras', 'ComprasController@Compras')->name('Compras');
Route::get('obtener_ultimo_id_compras', 'ComprasController@obtener_ultimo_id_compras')->name('obtener_ultimo_id_compras');
Route::post('guardar_compras', 'ComprasController@guardar_compras')->name('guardar_compras');
Route::get('listar_compras', 'ComprasController@listar_compras')->name('listar_compras');
Route::get('obtener_compras', 'ComprasController@obtener_compras')->name('obtener_compras');
Route::post('modificar_compras', 'ComprasController@modificar_compras')->name('modificar_compras');
Route::get('verificar_baja_compras', 'ComprasController@verificar_baja_compras')->name('verificar_baja_compras');
Route::post('baja_compras', 'ComprasController@baja_compras')->name('baja_compras');

/*---------------Controlador Productos-----------------*/
Route::get('Productos', 'ProductosController@Productos')->name('Productos');
Route::get('obtener_ultimo_id_productos', 'ProductosController@obtener_ultimo_id_productos')->name('obtener_ultimo_id_productos');
Route::post('guardar_productos', 'ProductosController@guardar_productos')->name('guardar_productos');
Route::get('listar_productos', 'ProductosController@listar_productos')->name('listar_productos');
Route::get('obtener_productos', 'ProductosController@obtener_productos')->name('obtener_productos');
Route::post('modificar_productos', 'ProductosController@modificar_productos')->name('modificar_productos');
Route::get('verificar_baja_productos', 'ProductosController@verificar_baja_productos')->name('verificar_baja_productos');
Route::post('baja_productos', 'ProductosController@baja_productos')->name('baja_productos');

/*---------------Controlador Vacaciones-----------------*/
Route::get('Holidays', 'HolidaysController@Holidays')->name('Holidays');
Route::get('obtener_ultimo_id_holidays', 'HolidaysController@obtener_ultimo_id_holidays')->name('obtener_ultimo_id_holidays');
Route::post('guardar_holidays', 'HolidaysController@guardar_holidays')->name('guardar_holidays');
Route::get('listar_holidays', 'HolidaysController@listar_holidays')->name('listar_holidays');
Route::get('obtener_holidays', 'HolidaysController@obtener_holidays')->name('obtener_holidays');
Route::post('modificar_holidays', 'HolidaysController@modificar_holidays')->name('modificar_holidays');
Route::get('verificar_baja_holidays', 'HolidaysController@verificar_baja_holidays')->name('verificar_baja_holidays');
Route::post('baja_holidays', 'HolidaysController@baja_holidays')->name('baja_holidays');

/*---------------Controlador de Permisos----------------*/
Route::get('Permi', 'PermiController@Permi')->name('Permi');
Route::get('obtener_ultimo_id_permi', 'PermiController@obtener_ultimo_id_permi')->name('obtener_ultimo_id_permi');
Route::post('guardar_permi', 'PermiController@guardar_permi')->name('guardar_permi');
Route::get('listar_permi', 'PermiController@listar_permi')->name('listar_permi');
Route::get('obtener_permi', 'PermiController@obtener_permi')->name('obtener_permi');
Route::post('modificar_permi', 'PermiController@modificar_permi')->name('modificar_permi');
Route::get('verificar_baja_permi', 'PermiController@verificar_baja_permi')->name('verificar_baja_permi');
Route::post('baja_permi', 'PermiController@baja_permi')->name('baja_permi');

/*-----------Controlador de Dias de Vacaciones------------*/
Route::get('Vacationdays', 'VacationdaysController@Vacationdays')->name('Vacationdays');
Route::get('obtener_ultimo_id_vacationdays', 'VacationdaysController@obtener_ultimo_id_vacationdays')->name('obtener_ultimo_id_vacationdays');
Route::post('guardar_vacationdays', 'VacationdaysController@guardar_vacationdays')->name('guardar_vacationdays');
Route::get('listar_vacationdays', 'VacationdaysController@listar_vacationdays')->name('listar_vacationdays');
Route::get('obtener_vacationdays', 'VacationdaysController@obtener_vacationdays')->name('obtener_vacationdays');
Route::post('modificar_vacationdays', 'VacationdaysController@modificar_vacationdays')->name('modificar_vacationdays');
Route::get('verificar_baja_vacationdays', 'VacationdaysController@verificar_baja_vacationdays')->name('verificar_baja_vacationdays');
Route::post('baja_vacationdays', 'VacationdaysController@baja_vacationdays')->name('baja_vacationdays');

/*-----------Controlador de Reporte de Vaciones------------*/
Route::get('Vacationreports', 'VacationreportsController@Vacationreports')->name('Vacationreports');
Route::get('obtener_ultimo_id_vacationreports', 'VacationreportsController@obtener_ultimo_id_vacationreports')->name('obtener_ultimo_id_vacationreports');
Route::post('guardar_vacationreports', 'VacationreportsController@guardar_vacationreports')->name('guardar_vacationreports');
Route::get('listar_vacationreports', 'VacationreportsController@listar_vacationreports')->name('listar_vacationreports');
Route::get('obtener_vacationreports', 'VacationreportsController@obtener_vacationreports')->name('obtener_vacationreports');
Route::post('modificar_vacationreports', 'VacationreportsController@modificar_vacationreports')->name('modificar_vacationreports');
Route::get('verificar_baja_vacationreports', 'VacationreportsController@verificar_baja_vacationreports')->name('verificar_baja_vacationreports');
Route::post('baja_vacationreports', 'VacationreportsController@baja_vacationreports')->name('baja_vacationreports');

/*-----------Controlador de Reporte de Permisos------------*/
Route::get('Permissionsreports', 'PermissionsreportsController@Permissionsreports')->name('Permissionsreports');
Route::get('obtener_ultimo_id_permissionsreports', 'PermissionsreportsController@obtener_ultimo_id_permissionsreports')->name('obtener_ultimo_id_permissionsreports');
Route::post('guardar_permissionsreports', 'PermissionsreportsController@guardar_permissionsreports')->name('guardar_permissionsreports');
Route::get('listar_permissionsreports', 'PermissionsreportsController@listar_permissionsreports')->name('listar_permissionsreports');
Route::get('obtener_permissionsreports', 'PermissionsreportsController@obtener_permissionsreports')->name('obtener_permissionsreports');
Route::post('modificar_permissionsreports', 'PermissionsreportsController@modificar_permissionsreports')->name('modificar_permissionsreports');
Route::get('verificar_baja_permissionsreports', 'PermissionsreportsController@verificar_baja_permissionsreports')->name('verificar_baja_permissionsreports');
Route::post('baja_permissionsreports', 'PermissionsreportsController@baja_permissionsreports')->name('baja_permissionsreports');

/*-----------------Controlador Cerrar Sesion---------------*/
Route::get('Exits', 'ExitsController@Exits')->name('Exits');
Route::get('obtener_ultimo_id_exits', 'ExitsController@obtener_ultimo_id_exits')->name('obtener_ultimo_id_exits');
Route::post('guardar_exits', 'ExitsController@guardar_exits')->name('guardar_exits');
Route::get('listar_exits', 'ExitsController@listar_exits')->name('listar_exits');
Route::get('obtener_exits', 'ExitsController@obtener_exits')->name('obtener_exits');
Route::post('modificar_exits', 'ExitsController@modificar_exits')->name('modificar_exits');
Route::get('verificar_baja_exits', 'ExitsController@verificar_baja_exits')->name('verificar_baja_exits');
Route::post('baja_exits', 'ExitsController@baja_exits')->name('baja_exits');

/*--------------------Controlador Asistencias-------------------*/
Route::get('Assistances', 'AssistancesController@Assistances')->middleware('can:Assistances')->name('Assistances');
Route::get('obtener_ultimo_id_assistances', 'AssistancesController@obtener_ultimo_id_assistances')->name('obtener_ultimo_id_assistances');
Route::post('guardar_assistances', 'AssistancesController@guardar_assistances')->name('guardar_assistances');
Route::get('listar_assistances', 'AssistancesController@listar_assistances')->name('listar_assistances');
Route::get('obtener_assistances', 'AssistancesController@obtener_assistances')->name('obtener_assistances');
Route::post('modificar_assistances', 'AssistancesController@modificar_assistances')->name('modificar_assistances');
Route::get('verificar_baja_assistances', 'AssistancesController@verificar_baja_assistances')->name('verificar_baja_assistances');
Route::post('baja_assistances', 'AssistancesController@baja_assistances')->name('baja_assistances');
Route::get('export_excel', 'AssistancesController@export_excel')->name('export_excel');
Route::get('obtener_fecha_actual_datetimelocal', 'AssistancesController@obtener_fecha_actual_datetimelocal')->name('obtener_fecha_actual_datetimelocal');
Route::get('leercodigo', 'AssistancesController@leercodigo')->name('leercodigo');
Route::get('obtener_business', 'AssistancesController@obtener_business')->name('obtener_business');
//Route::get('obtener_users', 'AssistancesController@obtener_users')->name('obtener_users');


/*--------------------Controlador Reporte de Asistencias-------------------*/
Route::get('Assistancesreports', 'AssistancesreportsController@Assistancesreports')->name('Assistancesreports');
Route::get('obtener_ultimo_id_assistancesreports', 'AssistancesreportsController@obtener_ultimo_id_assistancesreports')->name('obtener_ultimo_id_assistancesreports');
Route::post('guardar_assistancesreports', 'AssistancesreportsController@guardar_assistancesreports')->name('guardar_assistancesreports');
Route::get('listar_assistancesreports', 'AssistancesreportsController@listar_assistancesreports')->name('listar_assistancesreports');
Route::get('obtener_assistancesreports', 'AssistancesreportsController@obtener_assistancesreports')->name('obtener_assistancesreports');
Route::post('modificar_assistancesreports', 'AssistancesreportsController@modificar_assistancesreports')->name('modificar_assistancesreports');
Route::get('verificar_baja_assistancesreports', 'AssistancesreportsController@verificar_baja_assistancesreports')->name('verificar_baja_assistancesreports');
Route::post('baja_assistancesreports', 'AssistancesreportsController@baja_assistancesreports')->name('baja_assistancesreports');


