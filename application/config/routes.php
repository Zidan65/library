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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['dashboard'] = 'dashboard';
$route['buku'] = 'buku';
$route['buku/tambah'] = 'buku/tambah';
$route['buku/get_all'] = 'buku/get_all';
$route['buku/edit'] = 'buku/edit';
$route['buku/hapus/(:num)'] = 'buku/hapus/$1';
$route['kategori'] = 'kategori';
$route['kategori/tambah'] = 'kategori/tambah';
$route['kategori/get_all'] = 'kategori/get_all';
$route['kategori/edit'] = 'kategori/edit';
$route['kategori/hapus/(:num)'] = 'kategori/hapus/$1';
$route['anggota'] = 'anggota';
$route['anggota/tambah'] = 'anggota/tambah';
$route['anggota/edit'] = 'anggota/edit';
$route['anggota/hapus/(:num)'] = 'anggota/hapus/$1';
$route['peminjaman'] = 'peminjaman';
$route['peminjaman/tambah'] = 'peminjaman/tambah';
$route['peminjaman/get_all'] = 'peminjaman/get_all';
$route['peminjaman/edit/(:num)'] = 'peminjaman/edit/$1';
$route['peminjaman/hapus/(:num)'] = 'peminjaman/hapus/$1';
$route['login'] = 'login/index';
