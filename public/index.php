<?php

error_reporting(E_ALL);

include_once '../lib/Path.php';
include_once '../lib/Template.php';
include_once '../lib/Template/HTML.php';
include_once '../lib/Template/Content.php';
include_once '../lib/Template/ContentException.php';


define('DEVELOPER', true);
define('SCRIPT_NAME', $_SERVER['SCRIPT_NAME']);
define('BASE_PATH', dirname(SCRIPT_NAME));
define('HTACCESS', false);
define('PATH_INFO', Path::resolve(!HTACCESS ? substr($_SERVER['PATH_INFO'], 1) : 'toto: something else'));


$config = include '../config.php';

try {

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

} catch (Exception $e){
	if (DEVELOPER){
		echo '<pre><h1>' . $e->getMessage() . '</h1>';
		echo $e->getTraceAsString();
		echo '</pre>';
	} else {
		if ($e instanceof Template_ContentException){
			header('HTTP/1.1 404 Not Found');
		} else {
			header('HTTP/1.1 500 Internal Server Error');
		}
	}
}
