<?php

include_once 'Runner/mootorial.class.php';
include_once 'Runner/Template.php';
include_once 'Runner/Template/HTML.php';

define('SCRIPT_NAME', $_SERVER['SCRIPT_NAME']);
define('BASE_PATH', dirname(SCRIPT_NAME));
define('HTACCESS', false);

$mootorial = new Mootorial('./Source');

$tpl = new Template('templates');
$tpl->assign('mootorial', $mootorial);
$tpl->assign('HTML', new Template_HTML);


echo $tpl->fetch('layout.php');
