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
$routes->get('exams/details/(:num)', 'Exam::detail/$1');


//mentor dashboard
$routes->get('mentordashboard', 'MentorDashboard::index');
$routes->get('class', 'ClassController::view');
$routes->get('class/create', 'ClassController::create');

$routes->post('class/create', 'ClassController::saveCreate');
$routes->get('/class/detail/(:num)', 'MaterialController::getByClassId/$1');
$routes->get('class/update/(:num)', 'ClassController::updateClass/$1'); 

$routes->post('class/update/(:num)', 'ClassController::saveUpdate/$1'); 
$routes->get('class/delete/(:num)', 'ClassController::delete/$1'); 
$routes->get('class/search', 'ClassController::searchClass');
$routes->get('class/enroll/(:num)', 'ClassController::enrollClass/$1');
// $routes->post('class/update/', 'ClassController::update'); 

$routes->get('/material', 'MaterialController::index');
$routes->get('/material/create', 'MaterialController::create');
$routes->post('/material/store', 'MaterialController::store');
$routes->get('/material/edit/(:num)', 'MaterialController::edit/$1');
$routes->post('/material/delete/(:num)', 'MaterialController::delete/$1');
$routes->post('/material/update/(:num)', 'MaterialController::update/$1');

//student
$routes->get('student/class', 'ClassController::studentClass');
$routes->get('student/class/detail/(:num)', 'ClassController::studentClassDetail/$1');

$routes->get('notifications', 'NotificationController::showNotifications');
$routes->get('notifications/read', 'NotificationController::readNotifications');

$routes->get('class/create', 'ClassController::create');


$routes->get('exams/submissions/(:num)', 'ExamController::allExamSubmissions/$1');
$routes->get('exams/submissions/(:num)', 'Exam::getExamSubmissionsByExam/$1');
$routes->get('exams/create/(:num)', 'Exam::create/$1');
$routes->post('exams/create/(:num)', 'Exam::save/$1');
$routes->get('exams/delete/(:num)', 'Exam::delete/$1');
$routes->get('exam/(:num)', 'Exam::view/$1');
$routes->post('exam/submit/(:num)', 'Exam::submit/$1');

$routes->get('exams/details/(:num)', 'Exam::detail/$1');
$routes->get('question/create', 'Question::create');
$routes->post('question/store', 'Question::store');
$routes->get('question/(:num)', 'Question::index/$1'); 
$routes->get('question/delete/(:num)', 'Question::delete/$1');