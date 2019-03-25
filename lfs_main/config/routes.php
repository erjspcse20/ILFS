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
$route['default_controller'] = 'Login';
$route['ilfs-Data-Dropdown/(:any)'] = 'DataLoad/$1';

//public route
$route['welcome-to-ilfs-dashboard.jsp'] = 'Dashboard';
$route['ilfs-login.jsp'] = 'Login/loginstart';
$route['welecome-to-ilfs-login.jsp'] = 'Login';
$route['ilfs-Logout.jsp'] = 'Login/logout';
$route['welecome-to-ilfs-change-password.jsp'] = 'Dashboard/updatePassword';
$route['welecome-to-ilfs-change-password-start.jsp'] = 'Dashboard/updateUserPassword';

$route['add-ilfs-user.jsp'] = 'User';
$route['welcome-to-ilfs-add-user.jsp'] = 'User/AddUser';
$route['welcome-to-ilfs-edit-user.jsp/(:any)'] = 'User/EditUser/$1';
$route['welcome-to-ilfs-user-list.jsp'] = 'User/UserList';
$route['welcome-to-ilfs-update-user.jsp'] = 'User/UpdateUser';

$route['add-ilfs-party.jsp'] = 'Party';
$route['welcome-to-ilfs-add-party.jsp'] = 'Party/AddParty';
$route['welcome-to-ilfs-edit-party.jsp/(:any)'] = 'Party/EditParty/$1';
$route['welcome-to-ilfs-party-list.jsp'] = 'Party/PartyList';
$route['welcome-to-ilfs-update-party.jsp'] = 'Party/UpdateParty';

$route['add-ilfs-hsn.jsp'] = 'Hsn';
$route['welcome-to-ilfs-add-hsn.jsp'] = 'Hsn/AddHsn';
$route['welcome-to-ilfs-edit-hsn.jsp/(:any)'] = 'Hsn/EditHsn/$1';
$route['welcome-to-ilfs-hsn-list.jsp'] = 'Hsn/HsnList';
$route['welcome-to-ilfs-update-hsn.jsp'] = 'Hsn/UpdateHsn';

$route['add-ilfs-product.jsp'] = 'Product';
$route['welcome-to-ilfs-add-product.jsp'] = 'Product/AddProduct';
$route['welcome-to-ilfs-edit-product.jsp/(:any)'] = 'Product/EditProduct/$1';
$route['welcome-to-ilfs-product-list.jsp'] = 'Product/ProductList';
$route['welcome-to-ilfs-update-product.jsp'] = 'Product/UpdateProduct';
$route['welcome-to-ilfs-select-hsn.jsp'] = 'DataLoad/hsnList';

$route['add-ilfs-item.jsp'] = 'Item';
$route['welcome-to-ilfs-add-item.jsp'] = 'Item/AddItem';
$route['welcome-to-ilfs-edit-item.jsp/(:any)'] = 'Item/EditItem/$1';
$route['welcome-to-ilfs-item-list.jsp'] = 'Item/ItemList';
$route['welcome-to-ilfs-update-item.jsp'] = 'Item/UpdateItem';

$route['ilfs-bill-list.jsp'] = 'Bill/ItemList';
$route['welcome-to-ilfs-gentate-bill.jsp'] = 'Bill/GenrateBill';





$route['404_override'] = 'Error';
