<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_total_number_of_users($db) {
$administrator_user_level = "administrator";
$stmt_1 = $db->prepare("SELECT COUNT(*) AS count_result FROM users WHERE user_level != ?");
$stmt_1->bind_param('s', $administrator_user_level);
$stmt_1->execute();
$result_1 = $stmt_1->get_result();
$row = $result_1->fetch_assoc();
$stmt_1->close();
return $row['count_result'];
}

function get_paginated_users($db, $offset, $entries_per_page) {
$administrator_user_level = "administrator";
$stmt_2 = $db->prepare("SELECT user_id, public_id, username, user_email, user_level, user_date, last_activity, TIMESTAMPDIFF(MINUTE,last_activity,NOW()) AS last_activity_minutes FROM users WHERE user_level != ? ORDER BY user_date DESC LIMIT $offset, $entries_per_page");
$stmt_2->bind_param('s', $administrator_user_level);
if ($stmt_2->execute()) {
$result_2 = $stmt_2->get_result();
$users = $result_2->fetch_all(MYSQLI_ASSOC);
$stmt_2->close();
if ($users !== false && ! empty($users)) {
return $users;
} else {
return false;
}
} else {
return false;
}
}
