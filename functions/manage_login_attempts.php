<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_login_ip_address() {
if (isset($_SERVER['REMOTE_ADDR'])) {
$login_ip_address = $_SERVER['REMOTE_ADDR'];
if (filter_var($login_ip_address, FILTER_VALIDATE_IP)) {
return $login_ip_address;
} else {
return $login_ip_address = "invalid_ip_address";
}
}
}

function clear_login_attempts($db, $username_form) {
$login_ip_address = get_login_ip_address();
$stmt_1 = $db->prepare("DELETE FROM login_attempts WHERE username = ? AND ip_address = ?");
$stmt_1->bind_param('ss', $username_form, $login_ip_address);
$stmt_1->execute();
$stmt_1->close();
}

function is_login_blocked($db, $username_form) {
$login_ip_address = get_login_ip_address();
$stmt_2 = $db->prepare("SELECT attempts, last_attempt FROM login_attempts WHERE username = ? AND ip_address = ?");
$stmt_2->bind_param('ss', $username_form, $login_ip_address);
$stmt_2->execute();
$stmt_2->store_result();

if ($stmt_2->num_rows === 0) {
return false;
}

$stmt_2->bind_result($attempts, $last_attempt);
$stmt_2->fetch();
$stmt_2->close();

$block_time = 300;

if ($attempts >= 5) {
if (time() - strtotime($last_attempt) < $block_time) {
return true;
}
clear_login_attempts($db, $username_form);
}
return false;
}

function register_failed_login($db, $username_form) {
$login_ip_address = get_login_ip_address();
$stmt_3 = $db->prepare("INSERT INTO login_attempts(username, ip_address, attempts, last_attempt) VALUES(?, ?, 1, NOW()) ON DUPLICATE KEY UPDATE attempts = attempts + 1, last_attempt = NOW()");
$stmt_3->bind_param('ss', $username_form, $login_ip_address);
$stmt_3->execute();
$stmt_3->close();
}
