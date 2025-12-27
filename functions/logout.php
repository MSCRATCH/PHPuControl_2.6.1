<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function logout() {
unset($_SESSION['logged_in']['username']);
unset($_SESSION['logged_in']['user_level']);
unset($_SESSION['logged_in']['user_id']);
}
