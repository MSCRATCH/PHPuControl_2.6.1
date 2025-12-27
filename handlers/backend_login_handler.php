<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location: index.php?p=login');
exit();
}

if (backend_access_is_verified() === true) {
header('Location: index.php?p=dashboard');
exit();
}
//Administrator or moderator access only.

require_once themes_path. '/backend_theme/header_secondary.php';

if (isset($_POST['csrf_token'])) {
if (isset($_POST['backend_login'])) {
if (validate_token('backend_login', $_POST['csrf_token'])) {

$backend_login_name_form = '';
if (isset($_POST['backend_login_name_form'])) {
$backend_login_name_form = trim($_POST['backend_login_name_form']);
}

$backend_login_password_form = '';
if (isset($_POST['backend_login_password_form'])) {
$backend_login_password_form = trim($_POST['backend_login_password_form']);
}

$result = backend_login($db, $backend_login_name_form, $backend_login_password_form);
if ($result === true) {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'You have successfully authorized yourself to access the backend.';
$message_url = 'index.php?p=dashboard';
$message_button_text = 'Go to the dashboard';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
} else {
$errors = $result;
}
} else {
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'Your session has been terminated for security reasons.';
$message_url = 'index.php?p=backend_login';
$message_button_text = 'Return to the backend login';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
}
}

require_once templates_path. '/backend_login_template.php';

require_once themes_path. '/backend_theme/footer_secondary.php';
