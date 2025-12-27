<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function update_profile($db, $user_profile_location_form, $user_profile_description_form, $profile_user_id) {

$stmt = $db->prepare("UPDATE user_profiles SET user_profile_location = ?, user_profile_description = ?  WHERE user_id = ? LIMIT 1");
$stmt->bind_param('ssi', $user_profile_location_form, $user_profile_description_form, $profile_user_id);
if ($stmt->execute()) {
$stmt->close();
return true;
} else {
$stmt->close();
return false;
}
}
