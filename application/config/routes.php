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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['reference/(:any)/search'] = 'reference/search';
$route['reference/(:any)/add'] = 'reference/add';
$route['reference/(:any)/edit/(:num)'] = 'reference/edit/$2';
$route['reference/(:any)/delete/(:num)'] = 'reference/delete/$2';
$route['reference/(:any)/delete'] = 'reference/delete';
$route['reference/(:any)'] = 'reference/index';

$route['bidan/pelatihan/index/(:num)'] = 'bidan_pelatihan/index/$1';
$route['bidan/pelatihan/add/(:num)'] = 'bidan_pelatihan/add/$1';
$route['bidan/pelatihan/edit/(:num)/(:num)'] = 'bidan_pelatihan/edit/$1/$2';
$route['bidan/pelatihan/delete/(:num)'] = 'bidan_pelatihan/delete/$1';
$route['bidan/pelatihan/delete/(:num)/(:num)'] = 'bidan_pelatihan/delete/$1/$2';
$route['bidan/pelatihan/search/(:num)'] = 'bidan_pelatihan/search/$1';

$route['bidan/kta/index/(:num)'] = 'bidan_kta/index/$1';
$route['bidan/kta/add/(:num)'] = 'bidan_kta/add/$1';
$route['bidan/kta/edit/(:num)/(:num)'] = 'bidan_kta/edit/$1/$2';
$route['bidan/kta/delete/(:num)'] = 'bidan_kta/delete/$1';
$route['bidan/kta/delete/(:num)/(:num)'] = 'bidan_kta/delete/$1/$2';
$route['bidan/kta/search/(:num)'] = 'bidan_kta/search/$1';

$route['bidan/str/index/(:num)'] = 'bidan_str/index/$1';
$route['bidan/str/add/(:num)'] = 'bidan_str/add/$1';
$route['bidan/str/edit/(:num)/(:num)'] = 'bidan_str/edit/$1/$2';
$route['bidan/str/delete/(:num)'] = 'bidan_str/delete/$1';
$route['bidan/str/delete/(:num)/(:num)'] = 'bidan_str/delete/$1/$2';
$route['bidan/str/search/(:num)'] = 'bidan_str/search/$1';

$route['bidan/sipb_m/index/(:num)'] = 'bidan_sipb_m/index/$1';
$route['bidan/sipb_m/add/(:num)'] = 'bidan_sipb_m/add/$1';
$route['bidan/sipb_m/edit/(:num)/(:num)'] = 'bidan_sipb_m/edit/$1/$2';
$route['bidan/sipb_m/delete/(:num)'] = 'bidan_sipb_m/delete/$1';
$route['bidan/sipb_m/delete/(:num)/(:num)'] = 'bidan_sipb_m/delete/$1/$2';
$route['bidan/sipb_m/search/(:num)'] = 'bidan_sipb_m/search/$1';
$route['bidan/sipb_m/pdf/(:num)/(:num)'] = 'bidan_sipb_m/pdf/$1/$2';

$route['bidan/sipb_p/index/(:num)'] = 'bidan_sipb_p/index/$1';
$route['bidan/sipb_p/add/(:num)'] = 'bidan_sipb_p/add/$1';
$route['bidan/sipb_p/edit/(:num)/(:num)'] = 'bidan_sipb_p/edit/$1/$2';
$route['bidan/sipb_p/delete/(:num)'] = 'bidan_sipb_p/delete/$1';
$route['bidan/sipb_p/delete/(:num)/(:num)'] = 'bidan_sipb_p/delete/$1/$2';
$route['bidan/sipb_p/search/(:num)'] = 'bidan_sipb_p/search/$1';
$route['bidan/sipb_p/pdf/(:num)/(:num)'] = 'bidan_sipb_p/pdf/$1/$2';

$route['bidan/sib/index/(:num)'] = 'bidan_sib/index/$1';
$route['bidan/sib/add/(:num)'] = 'bidan_sib/add/$1';
$route['bidan/sib/edit/(:num)/(:num)'] = 'bidan_sib/edit/$1/$2';
$route['bidan/sib/delete/(:num)'] = 'bidan_sib/delete/$1';
$route['bidan/sib/delete/(:num)/(:num)'] = 'bidan_sib/delete/$1/$2';
$route['bidan/sib/search/(:num)'] = 'bidan_sib/search/$1';
