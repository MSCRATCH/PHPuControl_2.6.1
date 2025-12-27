<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_profile_by_public_user_id($db, $public_user_id_get) {
$stmt_1 = $db->prepare("SELECT users.username, users.user_level, users.last_activity, user_profiles.user_profile_image, user_profiles.user_profile_location, user_profiles.user_profile_description, TIMESTAMPDIFF(MINUTE,last_activity,NOW()) AS last_activity_minutes FROM users INNER JOIN user_profiles ON users.user_id = user_profiles.user_id WHERE users.public_id = ?");
$stmt_1->bind_param('s', $public_user_id_get);
$stmt_1->execute();
$result_1 = $stmt_1->get_result()->fetch_assoc();
$stmt_1->close();
return $result_1;
}

function get_profile_by_id($db, $profile_user_id) {
$stmt_1 = $db->prepare("SELECT users.username, users.user_level, users.last_activity, user_profiles.user_profile_image, user_profiles.user_profile_location, user_profiles.user_profile_description FROM users INNER JOIN user_profiles ON users.user_id = user_profiles.user_id WHERE users.user_id = ?");
$stmt_1->bind_param('i', $profile_user_id);
$stmt_1->execute();
$result_1 = $stmt_1->get_result()->fetch_assoc();
$stmt_1->close();
return $result_1;
}
