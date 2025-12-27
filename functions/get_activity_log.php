<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_total_number_entries_activity_log($db){
$stmt_1 = $db->query("SELECT COUNT(*) AS count_result FROM activity_log");
$row = $stmt_1->fetch_assoc();
$stmt_1->free();
return $row['count_result'];
}

function get_paginated_activity_log($db, $offset, $entries_per_page) {
$stmt_2 = $db->query("SELECT activity_log.activity_log_ip_address, activity_log.activity_log_browser, activity_log.activity_log_requested_url, activity_log.activity_log_timestamp, activity_log.user_id, users.username FROM activity_log LEFT JOIN users ON activity_log.user_id = users.user_id ORDER BY activity_log.activity_log_timestamp DESC LIMIT $offset, $entries_per_page");
$activity_log = $stmt_2->fetch_all(MYSQLI_ASSOC);
$stmt_2->free();
if ($activity_log !== false && ! empty($activity_log)) {
return $activity_log;
} else {
die("Failed to load the activity log due to a critical error.");
}
}

function get_activity_log($db) {
$stmt_3 = $db->query("SELECT activity_log.activity_log_ip_address, activity_log.activity_log_browser, activity_log.activity_log_requested_url, activity_log.activity_log_timestamp, activity_log.user_id, users.username FROM activity_log LEFT JOIN users ON activity_log.user_id = users.user_id ORDER BY activity_log.activity_log_timestamp");
$activity_log = $stmt_3->fetch_all(MYSQLI_ASSOC);
$stmt_3->free();
if ($activity_log !== false && ! empty($activity_log)) {
return $activity_log;
} else {
die("Failed to load the activity log due to a critical error.");
}
}
