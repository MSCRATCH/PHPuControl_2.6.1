<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function front_controller($db) {

$allowed_sections = array(
'home',
'login',
'register',
'logout',
'settings',
'activity_log',
'dashboard',
'blocklist',
'backend_login',
'backend_logout',
'users',
'profile',
'manage_profile',
'error_log',
'dashboard_moderator',
);

if (isset($_GET['p'])) {
$section = sanitize_1($_GET['p']);
if (in_array($section, $allowed_sections)) {
switch ($section) {
case 'home':
require_once handlers_path. '/home_handler.php';
break;
case 'login':
require_once handlers_path. '/login_handler.php';
break;
case 'register':
require_once handlers_path. '/register_handler.php';
break;
case 'logout':
require_once handlers_path. '/logout_handler.php';
break;
case 'settings':
require_once handlers_path. '/settings_handler.php';
break;
case 'activity_log':
require_once handlers_path. '/activity_log_handler.php';
break;
case 'dashboard':
require_once handlers_path. '/dashboard_handler.php';
break;
case 'blocklist':
require_once handlers_path. '/blocklist_handler.php';
break;
case 'backend_login':
require_once handlers_path. '/backend_login_handler.php';
break;
case 'backend_logout':
require_once handlers_path. '/backend_logout_handler.php';
break;
case 'users':
require_once handlers_path. '/users_handler.php';
break;
case 'profile':
require_once handlers_path. '/profile_handler.php';
break;
case 'manage_profile':
require_once handlers_path. '/manage_profile_handler.php';
break;
case 'error_log':
require_once handlers_path. '/error_log_handler.php';
break;
case 'dashboard_moderator':
require_once handlers_path. '/dashboard_moderator_handler.php';
break;
}
} else {
require_once handlers_path. '/home_handler.php';
}
} else {
require_once handlers_path. '/home_handler.php';
}
}
