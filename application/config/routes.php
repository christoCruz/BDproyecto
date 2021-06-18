<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'sValor';
$route['index.php/tablas/seleccion/(:num)'] = 'index,php/modaltabla/seleccion/$1';
$route['index.php/tablas/seleccion_accion/(:num)'] = 'index,php/editar_accion/seleccion_accion/$1';
$route['index.php/tablas/seleccion_aulas/(:num)'] = 'index,php/editar_aulas/seleccion_aulas/$1';
$route['index.php/tablas/seleccion_carrera/(:num)'] = 'index,php/editar_carrera/seleccion_carrera/$1';
$route['index.php/tablas/seleccion_coordinador/(:num)'] = 'index,php/editar_coordinador/seleccion_coordinador/$1';
$route['index.php/tablas/seleccion_departamento/(:num)'] = 'index,php/editar_departamento/seleccion_departamento/$1';
$route['index.php/tablas/seleccion_docente/(:num)'] = 'index,php/editar_docente/seleccion_docente/$1';
$route['index.php/tablas/seleccion_estudiantes/(:num)'] = 'index,php/editar_estudiantes/seleccion_estudiantes/$1';
$route['index.php/tablas/seleccion_grupos/(:num)'] = 'index,php/editar_grupos/seleccion_grupos/$1';
$route['index.php/tablas/seleccion_horarios_grupos/(:num)'] = 'index,php/editar_horarios_grupos/seleccion_horarios_grupos/$1';
$route['index.php/tablas/seleccion_horas_sociales/(:num)'] = 'index,php/editar_horas_sociales/seleccion_horas_sociales/$1';
$route['index.php/tablas/seleccion_inscripcion/(:num)'] = 'index,php/editar_inscripcion/seleccion_inscripcion/$1';
$route['index.php/tablas/seleccion_jefe/(:num)'] = 'index,php/editar_jefe/seleccion_jefe/$1';
$route['index.php/tablas/seleccion_materias/(:num)'] = 'index,php/editar_materias/seleccion_materias/$1';
$route['index.php/tablas/seleccion_preinscripcion/(:num)'] = 'index,php/editar_preinscripcion/seleccion_preinscripcion/$1';
$route['index.php/tablas/seleccion_registro_estudiante/(:num)'] = 'index,php/editar_registro_estudiante/seleccion_registro_estudiante/$1';
$route['index.php/tablas/seleccion_reportechoque/(:num)'] = 'index,php/editar_reportechoque/seleccion_reportechoque/$1';
$route['index.php/usuarios/seleccion_usuario/(:num)'] = 'index,php/editar_usuario/seleccion_usuario/$1';

//$route['index.php/Detalles/(:num)'] = 'index,php/Detalles/$1';
$route['404_override'] = 'welcome';

$route['translate_uri_dashes'] = FALSE;


