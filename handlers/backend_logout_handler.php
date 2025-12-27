<?php
defined('MAIN') or die("Direct access to this file is restricted.");

//Administrator or moderator access only.
if (user_is_administrator_or_moderator() === false) {
header('Location: index.php');
exit();
}
//Administrator or moderator access only.

if (backend_access_is_verified() === false) {
require_once themes_path. '/backend_theme/header_secondary.php';
logout();
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'You have been successfully logged out.';
$message_url = 'index.php?p=home';
$message_button_text = 'Back to the homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/header.php';
exit();
} else {
require_once themes_path. '/backend_theme/header_secondary.php';
backend_logout();
$message_wrapper = 'wrapper_narrow_bg';
$message_text = 'You have been successfully logged out.';
$message_url = 'index.php?p=home';
$message_button_text = 'Back to the homepage';
echo system_message($message_wrapper, $message_text, $message_url, $message_button_text);
require_once themes_path. '/backend_theme/footer_secondary.php';
exit();
}
