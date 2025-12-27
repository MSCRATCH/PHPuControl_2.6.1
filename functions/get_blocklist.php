<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_blocklist($db) {
$stmt = $db->query("SELECT blocklist_id, blocklist_value FROM blocklist");
$blocklist = $stmt->fetch_all(MYSQLI_ASSOC);
$stmt->free();
if ($blocklist !== false && ! empty($blocklist)) {
return $blocklist;
} else {
return false;
}
}

function get_blocklist_usernames($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_usernames = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "username") {
$blocklist_usernames [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_usernames)) {
return $blocklist_usernames;
} else {
return false;
}
}
}

function get_blocklist_names($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_names = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "name") {
$blocklist_names [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_names)) {
return $blocklist_names;
} else {
return false;
}
}
}

function get_blocklist_emails($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_emails = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "email") {
$blocklist_emails [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_emails)) {
return $blocklist_emails;
} else {
return false;
}
}
}

function get_blocklist_domains($db) {

$result = get_blocklist($db);
if ($result) {
$blocklist_domains = array();
foreach ($result as $row) {
list($type, $value) = explode('_', $row['blocklist_value']);
if ($type === "domain") {
$blocklist_domains [] = $row['blocklist_value'];
}
}
if (! empty($blocklist_domains)) {
return $blocklist_domains;
} else {
return false;
}
}
}
