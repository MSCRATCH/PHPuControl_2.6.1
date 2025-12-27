<?php
defined('MAIN') or die("Direct access to this file is restricted.");

function system_message($message_wrapper, $message_text, $message_url, $message_button_text) {
$output = '';
$output .= '<div class="'. sanitize_1($message_wrapper).'">';
$output .= '<div class="wrapper_title"><h3>'. SYSTEM_MESSAGE_TITLE. '</h3></div>';
$output .= '<div class="msg_default">';
$output .= '<ul>';
$output .= '<li class="list_style_none">'. sanitize_1($message_text). '</p>';
$output .= '<a href="'. sanitize_1($message_url). '">'. '<button class="msg_btn">'. sanitize_1($message_button_text). '</button>'. '</a>';
$output .= '</ul>';
$output .= '</div>';
$output .= '</div>';
return $output;
}
