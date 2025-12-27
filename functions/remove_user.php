<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function check_if_is_administrator($db, $user_id_remove_user_confirm_form) {

$stmt_1 = $db->prepare("SELECT user_level FROM users WHERE user_id = ?");
$stmt_1->bind_param('i', $user_id_remove_user_confirm_form);
$stmt_1->execute();
$stmt_1->bind_result($user_level);
$stmt_1->fetch();
$stmt_1->close();
if ($user_level === "administrator") {
return true;
} else {
return false;
}
}

function remove_user($db, $user_id_remove_user_confirm_form) {
$result = check_if_is_administrator($db, $user_id_remove_user_confirm_form);
if ($result === false) {
$stmt_2 = $db->prepare("DELETE FROM users WHERE user_id = ? LIMIT 1");
$stmt_2->bind_param('i', $user_id_remove_user_confirm_form);
$stmt_2->execute();
$success = $stmt_2->affected_rows;
$stmt_2->close();
if ($success === 1) {
return true;
} else {
return false;
}
} else {
die("The user is an administrator and cannot be removed.");
}
}
