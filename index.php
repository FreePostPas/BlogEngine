<?php
error_reporting(E_ALL);

require('config.php');
require('system/loader.php');
require('system/misc.php');
require('helpers/misc.php');

//Founding needed controller/action
$uri = explode("/", $_SERVER['REQUEST_URI']);

if($_CONFIG['installed_in_subdomain'] && array_key_exists(1, $uri))
	$controller = $uri[1];
else if(!$_CONFIG['installed_in_subdomain'] && array_key_exists(2, $uri) && $uri[2] != '' && strpos($uri[2], '?') !== 0)
	$controller = $uri[2];
else
	$controller = $_CONFIG['default_controller'];

if($_CONFIG['installed_in_subdomain'] && array_key_exists(2, $uri))
	$action = $uri[2];
else if(!$_CONFIG['installed_in_subdomain'] && array_key_exists(3, $uri) && $uri[3] != '')
	$action = $uri[3];
else
	$action = 'index';


//Try to GET var who can't be naturaly parsed by php
try_extract_args_from_uri_fragments($controller);
try_extract_args_from_uri_fragments($action);

if(is_readable('controllers/'.$controller.'.php'))
{
	require('controllers/'.$controller.'.php');
	$controller = new $controller;
	if(method_exists($controller, $action))
		$controller->$action($_GET);
	else
		render('404');
}
else
	render('404');


?>
