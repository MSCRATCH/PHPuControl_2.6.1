<?php
defined('MAIN') or die("Direct access to this file is restricted.");
?>

<?php  $token_submit_settings = generate_token('submit_settings'); ?>

<?php if (! isset($errors)) {$errors = '';}?>
<?php if (! empty($errors)) { ?>
<div class="template_wrapper_mb">
<div class="wrapper_title"><h3><?php echo sanitize_1(SYSTEM_MESSAGE_TITLE);?></h3></div>
<div class="wrapper_content">
<ul>
<?php foreach ($errors as $error_content) {  ?>
<?php echo '<li class="list_style_none">'. sanitize_1($error_content). '</li>';?>
<?php } ?>
</ul>
</div>
</div>
<?php } ?>

<div class="template_wrapper">
<div class="wrapper_title"><h3>Blocklist for registration</h3></div>
<div class="wrapper_content">
<div class="column">
<form method="post">
<?php foreach ($settings as $setting) {  ?>
<label class="label_default" for="<?php echo sanitize_1($setting['setting_key']);?>"><?php echo sanitize_3($setting['setting_key']);?></label>
<input class="form_text_default" type="text" name="settings_form[<?php echo sanitize_1($setting['setting_key']);?>]" id="<?php echo sanitize_1($setting['setting_key']);?>" value="<?php echo sanitize_1($setting['setting_value']);?>">
<input type="hidden" name="csrf_token" value="<?php echo $token_submit_settings;?>">
<?php } ?>
<button class="btn_dynamic_mtb" type="submit" name="submit_settings">Submit</button>
</form>
</div>
</div>
</div>
