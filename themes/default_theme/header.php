<?php
defined('MAIN') or die("Direct access to this file is restricted.");
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo PAGE_TITLE;?></title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../themes/default_theme/default.css" media="all" type="text/css">
<script src="../themes/default_theme/js/menu.js" defer></script>
<script src="../themes/default_theme/js/upd_btn.js" defer></script>
</head>
<body>
<nav class="navbar">
<div class="navbar_title"><?php echo PAGE_TITLE;?></div>
<a href="#" class="toggle_button">Menu</a>
<div class="navbar_links">
<ul>
<li><a href="index.php">Home</a></li>
<?php if (user_is_logged_in() === false) { ?>
<li><a href="index.php?p=login">Login</a></li>
<li><a href="index.php?p=register">Register</a></li>
<?php } ?>
<?php if (user_is_logged_in() === true) { ?>
<?php $username_header = get_username(); ?>
<?php $public_user_id_header = get_public_user_id(); ?>
<li><a href="index.php?p=profile&id=<?php echo sanitize_1($public_user_id_header);?>"><?php echo sanitize_3($username_header);?></a></li>
<li><a href="index.php?p=manage_profile">Settings</a></li>
<?php if (user_is_administrator() === true) { ?>
<li><a href="index.php?p=dashboard">Dashboard</a></li>
<?php } ?>
<?php if (user_is_moderator() === true) { ?>
<li><a href="index.php?p=dashboard_moderator">Dashboard</a></li>
<?php } ?>
<li><a href="index.php?p=logout">Logout</a></li>
<?php } ?>
</ul>
</div>
</nav>
<div class="main_wrapper">
