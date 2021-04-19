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
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

/** Web */
$route = array_merge($route, array(
  'rent/timeline'          => 'web/rent/TimelineController/index',
  'rent/timeline/calendar' => 'web/rent/TimelineController/calendar',

  'rent/items'               => 'web/rent/ItemController/index',
  'rent/items/new'           => 'web/rent/ItemController/new',
  'rent/items/create'        => 'web/rent/ItemController/create',
  'rent/items/update'        => 'web/rent/ItemController/update',
  'rent/items/(:num)/edit'   => 'web/rent/ItemController/edit/$1',
  'rent/items/(:num)/delete' => 'web/rent/ItemController/delete/$1',

  'rent/transactions'                             => 'web/rent/TransactionController/index',
  'rent/transactions/new'                         => 'web/rent/TransactionController/new',
  'rent/transactions/create'                      => 'web/rent/TransactionController/create',
  'rent/transactions/update'                      => 'web/rent/TransactionController/update',
  'rent/transactions/(:num)/(:num)/status/(:num)/(:num)' => 'web/rent/TransactionController/update_status/$1/$2/$3/$4',
  'rent/transactions/(:num)/edit'                 => 'web/rent/TransactionController/edit/$1',
  'rent/transactions/(:num)/(:num)/delete/(:num)' => 'web/rent/TransactionController/delete/$1/$2/$3',
));

/** API */
$route = array_merge($route, array(
  'api/rent/items/(:num)/transactions' => 'api/rent/TransactionApiController/index/$1',
));
