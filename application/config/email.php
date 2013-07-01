<?php

/*
 * What protocol to use?
 * mail, sendmail, smtp
 */

$config['protocol'] = 'sendmail';
$config['mailpath'] = '/usr/sbin/sendmail';
$config['charset'] = 'utf-8';

$config['smtp_host'] = 'mail.deryauzun.com.tr';
$config['smtp_port'] = '587';

$config['smtp_user'] = 'posta@deryauzun.com.tr';
$config['smtp_pass'] = '443443';


/*
 * Heroku Sendgrid information.
 */
/*
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.sendgrid.net';
$config['smtp_port'] = 587;
$config['smtp_user'] = $_SERVER['SENDGRID_USERNAME'];
$config['smtp_pass'] = $_SERVER['SENDGRID_PASSWORD'];
*/
