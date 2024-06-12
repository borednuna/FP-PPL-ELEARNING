<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/register', 'Auth::register');
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/login', 'Auth::login');
$routes->get('auth/logout', 'Auth::logout');
$routes->get('dashboard', 'Dashboard::index');
$routes->get('assignments/details/(:num)', 'AssignmentController::detail/$1');
$routes->get('assignments/create', 'AssignmentController::create');
$routes->post('assignments/create', 'AssignmentController::save');
$routes->put('assignments/update/(:num)', 'AssignmentController::update/$1');
$routes->delete('assignments/delete/(:num)', 'AssignmentController::delete/$1');
$routes->post('assignments/submit/(:num)', 'AssignmentController::submit/$1');
$routes->delete('assignments/submit/delete/(:num)', 'AssignmentController::deleteSubmission/$1');
$routes->get('assignments/submissions/(:num)', 'AssignmentController::allSubmissions/$1');
$routes->post('assignments/update_grade', 'AssignmentController::updateGrade');
$routes->get('notifikasi', 'NotificationController::showNotifications');
