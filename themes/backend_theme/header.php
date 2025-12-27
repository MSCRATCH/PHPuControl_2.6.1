<?php
defined('MAIN') or die("Direct access to this file is restricted.");
?>

<!DOCTYPE html>
<html lang="de">
<head>
<title><?php echo SCRIPTNAME;?></title>
<meta charset="utf-8">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="MSCRATCH">
<meta name="revisit-after" content="2 days">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../themes/backend_theme/backend.css" media="all" type="text/css">
</head>
<body>
<div class="template_primary_wrapper_row">
<div class="template_column_1">
<div class="sidebar_nav">
<ul>
<div class="sidebar_nav_title"><h3><?php echo SCRIPTNAME;?> <?php echo VERSION;?></h3></div>
<?php if (user_is_moderator() === true) { ?>
<li><a href="index.php?p=home">Back to homepage</a></li>
<li><a href="index.php?p=dashboard_moderator">Dashboard</a></li>
<?php } ?>
<?php if (user_is_administrator() === true) { ?>
  <li><a href="index.php?p=home">Back to homepage</a></li>
<li><a href="index.php?p=dashboard">Dashboard</a></li>
<li><a href="index.php?p=settings">Settings</a></li>
<li><a href="index.php?p=activity_log">Activity log</a></li>
<li><a href="index.php?p=error_log">Error log</a></li>
<li><a href="index.php?p=blocklist">Blocklist</a></li>
<li><a href="index.php?p=users">User management</a></li>
<?php } ?>
<?php if (user_is_administrator_or_moderator() === true) { ?>
<li><a href="index.php?p=backend_logout">Logout</a></li>
<?php } ?>
</ul>
</div>
</div>
<div class="template_column_2">
