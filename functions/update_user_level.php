<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function update_user_level($db, $user_level_form, $user_id_user_level_form) {

$stmt = $db->prepare("UPDATE users SET user_level = ? WHERE user_id = ? LIMIT 1");
$stmt->bind_param('si', $user_level_form, $user_id_user_level_form);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
