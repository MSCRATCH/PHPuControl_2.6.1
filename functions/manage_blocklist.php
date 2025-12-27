<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function get_blocklist_id($db, $blocklist_value_remove) {
$get_blocklist_id = $db->prepare("SELECT blocklist_id FROM blocklist WHERE blocklist_value = ?");
$get_blocklist_id->bind_param('s', $blocklist_value_remove);
$get_blocklist_id->execute();
$get_blocklist_id->store_result();
if ($get_blocklist_id->num_rows === 1) {
$get_blocklist_id->bind_result($blocklist_id);
$get_blocklist_id->fetch();
$get_blocklist_id->close();
return $blocklist_id;
} else {
return false;
}
}

function save_blocklist_entry($db, $blocklist_entry_form) {
$save_blocklist_entry = $db->prepare("INSERT INTO blocklist(blocklist_value) VALUES(?) ON DUPLICATE KEY UPDATE blocklist_value = VALUES(blocklist_value)");
$save_blocklist_entry->bind_param('s', $blocklist_entry_form);
if ($save_blocklist_entry->execute()) {
$save_blocklist_entry->close();
return true;
} else {
$save_blocklist_entry->close();
return false;
}
}

function remove_blocklist_entry($db, $blocklist_id) {
$remove_blocklist_entry = $db->prepare("DELETE FROM blocklist WHERE blocklist_id = ? LIMIT 1");
$remove_blocklist_entry->bind_param('i', $blocklist_id);
if ($remove_blocklist_entry->execute()) {
$remove_blocklist_entry->close();
return true;
} else {
$save_blocklist_entry->close();
return false;
}
}

function manage_blocklist($db, $blocklist_command) {

$errors = array();

$allowed_commands = array(
'save',
'remove',
);

$allowed_types = array(
'username',
'domain',
'email',
'name',
);

if (empty($blocklist_command)) {
$errors [] = MSG_MANAGE_BLOCKLIST_NO_VALUE;
return $errors;
}

$parts = explode('_', $blocklist_command, 3);

if (count($parts) !== 3) {
$errors [] = MSG_MANAGE_BLOCKLIST_INVALID_FORMAT;
return $errors;
}

list($command, $type, $value) = $parts;


if (! in_array($command, $allowed_commands)) {
$errors [] = MSG_MANAGE_BLOCKLIST_INVALID_COMMAND;
}

if (! in_array($type, $allowed_types)) {
$errors [] = MSG_MANAGE_BLOCKLIST_INVALID_TYPE;
}

$command = trim($command);
$type = trim($type);
$value = trim($value);

switch ($type) {
case 'username':
if (! preg_match('/^[a-zA-Z0-9]+$/', $value)) {
$errors[] = MSG_MANAGE_BLOCKLIST_INVALID_VALUE_USERNAME;
}
break;
case 'name':
if (! preg_match('/^[a-zA-Z]+$/', $value)) {
$errors[] = MSG_MANAGE_BLOCKLIST_INVALID_VALUE_NAME;
}
break;
case 'email':
if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
$errors[] = MSG_MANAGE_BLOCKLIST_INVALID_VALUE_EMAIL;
}
break;
case 'domain':
if (!preg_match('/^[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/', $value)) {
$errors[] = MSG_MANAGE_BLOCKLIST_INVALID_VALUE_DOMAIN;
}
break;
}

if (empty($errors)) {
switch ($command) {
case 'remove':
$value_remove = $type. '_'. $value;
$blocklist_id = get_blocklist_id($db, $value_remove);
if ($blocklist_id === false) {
$errors [] = MSG_MANAGE_BLOCKLIST_NON_EXISTING_VALUE;
} else {
$result_remove = remove_blocklist_entry($db, $blocklist_id);
if ($result_remove === false) {
$errors [] = MSG_MANAGE_BLOCKLIST_FAILURE_REMOVE_STMT;
}
}
break;
case 'save':
$value_save = $type. '_'. $value;
$result_save = save_blocklist_entry($db, $value_save);
if ($result_save === false) {
$errors [] = MSG_MANAGE_BLOCKLIST_FAILURE_SAVE_STMT;
}
break;
}
}
if (empty($errors)) {
return true;
} else {
return $errors;
}
}
