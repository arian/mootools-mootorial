<?php

error_reporting(E_ALL);

include_once '../lib/Path.php';
include_once '../lib/Template.php';
include_once '../lib/Template/HTML.php';
include_once '../lib/Template/Content.php';


define('SCRIPT_NAME', $_SERVER['SCRIPT_NAME']);
define('BASE_PATH', dirname(SCRIPT_NAME));
define('HTACCESS', false);
define('PATH_INFO', Path::resolve(!HTACCESS ? substr($_SERVER['PATH_INFO'], 1) : 'toto: something else'));


$config = include '../config.php';

$tpl = new Template('../templates');
$tpl->assign('HTML', new Template_HTML);
$tpl->assign('Content', new Template_Content('../Source', $config));

// Pass the pages through for the menu
$tpl->assign('pages', $config['pages']);

if (strstr(PATH_INFO, '/') !== false){
	$tpl->assign('section', PATH_INFO);
	$tpl->assign('chapter', false);
} else {
	$tpl->assign('section', false);
	$tpl->assign('chapter', PATH_INFO);
}

echo $tpl->fetch('layout.php');
