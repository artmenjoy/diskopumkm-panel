<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// auth
$route['login'] = 'auth/c_login/login';
$route['logout'] = 'auth/c_login/logout';
$route['validate'] = 'auth/c_login/validate';
// $route['registration'] = 'auth/c_login/registration';
// $route['registration/attemp']['POST'] = 'auth/c_login/reg_attemp';

$route['auth/users'] = 'auth/c_users';
$route['auth/users/data'] = 'auth/c_users/data';
$route['auth/users/create']['POST'] = 'auth/c_users/create';
$route['auth/users/get']['POST'] = 'auth/c_users/get';
$route['auth/users/update']['POST'] = 'auth/c_users/update';
$route['auth/users/update_image']['POST'] = 'auth/c_users/update_image';
$route['auth/users/delete']['POST'] = 'auth/c_users/delete';
$route['auth/users/password_update']['POST'] = 'auth/c_users/password_update';

$route['auth/roles'] = 'auth/c_roles';
$route['auth/roles/data'] = 'auth/c_roles/data';
$route['auth/roles/create']['POST'] = 'auth/c_roles/create';
$route['auth/roles/get']['POST'] = 'auth/c_roles/get';
$route['auth/roles/update']['POST'] = 'auth/c_roles/update';
$route['auth/roles/delete']['POST'] = 'auth/c_roles/delete';
$route['auth/roles/has_permissions']['POST'] = 'auth/c_roles/has_permissions';
$route['auth/roles/permissions_update']['POST'] = 'auth/c_roles/permissions_update';

$route['auth/permissions'] = 'auth/c_permissions';
$route['auth/permissions/data'] = 'auth/c_permissions/data';
$route['auth/permissions/create']['POST'] = 'auth/c_permissions/create';
$route['auth/permissions/get']['POST'] = 'auth/c_permissions/get';
$route['auth/permissions/update']['POST'] = 'auth/c_permissions/update';
$route['auth/permissions/delete']['POST'] = 'auth/c_permissions/delete';

//ref
$route['ref/post_category'] = 'ref/c_post_category';
$route['ref/post_category/data'] = 'ref/c_post_category/data';
$route['ref/post_category/create']['POST'] = 'ref/c_post_category/create';
$route['ref/post_category/get']['POST'] = 'ref/c_post_category/get';
$route['ref/post_category/update']['POST'] = 'ref/c_post_category/update';
$route['ref/post_category/delete']['POST'] = 'ref/c_post_category/delete';

$route['ref/settings'] = 'ref/c_settings';
$route['ref/settings/data'] = 'ref/c_settings/data';
$route['ref/settings/create']['POST'] = 'ref/c_settings/create';
$route['ref/settings/get']['POST'] = 'ref/c_settings/get';
$route['ref/settings/update']['POST'] = 'ref/c_settings/update';
$route['ref/settings/delete']['POST'] = 'ref/c_settings/delete';

//main

$route['home'] = 'dash/c_home';

$route['profile'] = 'auth/c_profile';
$route['profile/update']['POST'] = 'auth/c_profile/update';
$route['profile/update_password']['POST'] = 'auth/c_profile/update_password';
$route['profile/update_image']['POST'] = 'auth/c_profile/update_image';

// content

$route['content/post'] = 'content/c_post';
$route['content/post/data'] = 'content/c_post/data';
$route['content/post/create']['POST'] = 'content/c_post/create';
$route['content/post/get']['POST'] = 'content/c_post/get';
$route['content/post/update']['POST'] = 'content/c_post/update';
$route['content/post/update_image']['POST'] = 'content/c_post/update_image';
$route['content/post/delete']['POST'] = 'content/c_post/delete';
$route['content/post/preview/(:num)'] = 'content/c_post/preview/$1';

$route['content/page'] = 'content/c_page';
$route['content/page/data'] = 'content/c_page/data';
$route['content/page/create']['POST'] = 'content/c_page/create';
$route['content/page/get']['POST'] = 'content/c_page/get';
$route['content/page/update']['POST'] = 'content/c_page/update';
$route['content/page/update_image']['POST'] = 'content/c_page/update_image';
$route['content/page/delete']['POST'] = 'content/c_page/delete';
$route['content/page/preview/(:any)'] = 'content/c_page/preview/$1';

$route['content/announcement'] = 'content/c_announcement';
$route['content/announcement/data'] = 'content/c_announcement/data';
$route['content/announcement/create']['POST'] = 'content/c_announcement/create';
$route['content/announcement/get']['POST'] = 'content/c_announcement/get';
$route['content/announcement/update']['POST'] = 'content/c_announcement/update';
$route['content/announcement/update_image']['POST'] = 'content/c_announcement/update_image';
$route['content/announcement/delete']['POST'] = 'content/c_announcement/delete';
$route['content/announcement/activate']['POST'] = 'content/c_announcement/activate';
$route['content/announcement/inactivate'] = 'content/c_announcement/inactivate';

$route['content/service'] = 'content/c_service';
$route['content/service/data'] = 'content/c_service/data';
$route['content/service/create']['POST'] = 'content/c_service/create';
$route['content/service/get']['POST'] = 'content/c_service/get';
$route['content/service/update']['POST'] = 'content/c_service/update';
$route['content/service/update_image']['POST'] = 'content/c_service/update_image';
$route['content/service/delete']['POST'] = 'content/c_service/delete';

$route['content/sliders'] = 'content/c_sliders';
$route['content/sliders/data'] = 'content/c_sliders/data';
$route['content/sliders/create']['POST'] = 'content/c_sliders/create';
$route['content/sliders/get']['POST'] = 'content/c_sliders/get';
$route['content/sliders/update']['POST'] = 'content/c_sliders/update';
$route['content/sliders/update_image']['POST'] = 'content/c_sliders/update_image';
$route['content/sliders/delete']['POST'] = 'content/c_sliders/delete';

// end

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

