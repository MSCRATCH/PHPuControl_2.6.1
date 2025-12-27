<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_settings($db) {
$stmt = $db->query("SELECT setting_id, setting_key, setting_value FROM settings");
$settings = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($settings !== false && ! empty($settings)) {
return $settings;
} else {
die("Failed to load settings due to a critical error.");
}
}
