<?php

function mailer_config(PHPMailer $mailer){
  $mailer->CharSet  = "utf-8";
  $mailer->isHTML(true);
}
add_action( 'phpmailer_init', 'mailer_config', 10, 1);