<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_total_number_of_errors($db) {
$stmt_1 = $db->query("SELECT COUNT(*) AS count_result FROM error_log");
$row = $stmt_1->fetch_assoc();
$stmt_1->free();
return $row['count_result'];
}

function get_paginated_error_log($db, $offset, $entries_per_page) {
$stmt_2 = $db->query("SELECT errno, errstr, errfile, errline, err_registered_at FROM error_log ORDER BY err_registered_at DESC LIMIT $offset, $entries_per_page");
$error_log = $stmt_2->fetch_all(MYSQLI_ASSOC);
$stmt_2->free();
if ($error_log !== false && ! empty($error_log)) {
return $error_log;
} else {
return false;
}
}
