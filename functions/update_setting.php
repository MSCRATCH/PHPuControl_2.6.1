<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function update_setting($db, $settings_form) {

$errors = array();

$allowed_keys = array(
'page_title',
'security_question',
'security_question_answer',
'system_message_title',
'disable_registration',
);

foreach ($settings_form as $setting_key_form => $setting_value_form) {
if (! in_array($setting_key_form, $allowed_keys)) {
$errors [] = MSG_UPDATE_SETTING_INVALID_KEY;
}

if (empty($setting_value_form)) {
$errors [] = MSG_UPDATE_SETTING_NO_VALUE;
}

if (empty($setting_key_form)) {
$errors [] = MSG_UPDATE_SETTING_NO_KEY;
}

if ($setting_key_form === "disable_registration") {
if ($setting_value_form !== "yes" && $setting_value_form !== "no") {
$errors [] = MSG_UPDATE_SETTING_INVALID_REG_VALUE;
}
}
}

if (empty($errors)) {
foreach ($settings_form as $setting_key_form => $setting_value_form) {
$setting_value_form_trimmed = trim($setting_value_form);
$setting_key_form_trimmed = trim($setting_key_form);
$stmt = $db->prepare("UPDATE settings SET setting_value = ? WHERE setting_key = ? LIMIT 1");
$stmt->bind_param('ss', $setting_value_form_trimmed, $setting_key_form_trimmed);
$stmt->execute();
if ($stmt->errno) {
$errors [] = MSG_UPDATE_SETTING_FAILURE_STMT;
}
}
if (empty($errors)) {
return true;
} else {
return $errors;
}
} else {
return $errors;
}
}
