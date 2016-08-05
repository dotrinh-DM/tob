<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "home/index";
$route['admin'] = "admin/dashboard";
//search all
$route['admin/search_all'] = "admin/dashboard/search_all";
$route['admin/search_all/(.*)']    = "admin/dashboard/search_all/$1";
//end search
//frontend page
$route['register'] = "home/register";
$route['collection'] = "home/collection";
$route['giai-thuong'] = "home/index/awards";
$route['register/getDistrict']              = "home/register/getDistrict";
$route['register/getDistrict/(.*)']         = "home/register/getDistrict/$1";
$route['register/getDistrict/(.*)/(.*)']    = "home/register/getDistrict/$1/$2";

$route['home'] = "home/index";
$route['login'] = "home/index/login";
$route['forgot_password'] = "home/index/forgot_password";
$route['logout'] = "home/index/logout";
$route['news'] = "home/news";
$route['news/(.*)'] = "home/news/index/$1";
$route['photos/(.*)/(.*)'] = "home/collection/imageDetail/$2";
$route['qna'] = "home/qanda/index";
$route['qna/(.*)'] = "home/qanda/index/$1";
$route['qna/create'] = "home/qanda/create";

$route['nha-tai-tro'] = "home/index/donors";
$route['ban-giam-khao'] = "home/index/jury";
$route['rules'] = "home/index/rules";
$route['xem-binh-chon'] = "home/listcollection";
$route['xem-binh-chon/(.*)'] = "home/listcollection/index/$1";
$route['xem-binh-chon/get_list_collection'] = "home/listcollection/get_list_collection";
$route['xem-binh-chon/get_load_collection'] = "home/listcollection/get_load_collection";
$route['dang-album'] = "home/collection";
$route['danh-sach-da-dang'] = "home/collection/listUploaded";
$route['danh-sach-duoc-tag'] = "home/collection/listTagged";

//$route['user/info/(.*)']              = "home/user_home/getUserInfo/$1";
$route['u/(.*)']              = "home/user_home/getUserInfo/$1";
$route['user/getDistrict/(.*)']         = "home/user_home/getDistrict/$1";
$route['user/getDistrict/(.*)/(.*)']    = "home/user_home/getDistrict/$1/$2";


$route['404_override'] = 'home/index/not_found_404';
//$route['']


//$route['category/lists/(:num)/(.*)/(.*)'] = 'frontend/category/lists/$1/$2/$3';
//$route['category/index/(.*)/(.*)']    = "frontend/category/index/$1/$2"
/* End of file routes.php */
/* Location: ./application/config/routes.php */