<?php

use vendor\core\Router;

$query = rtrim($_SERVER["QUERY_STRING"], '/');

require '../config/config_const.php';
require '../vendor/libs/functions.php';


spl_autoload_register(function($class){
	$file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
	if (is_file($file)) {
		require_once $file;
	}
});



new \vendor\core\App();

Router::add('^sendmail$', ['controller' => 'Main', 'action' => 'sendMail']);
Router::add('^about$', ['controller' => 'Main', 'action' => 'about']);
Router::add('^filter$', ['controller' => 'Main', 'action' => 'filter']);
Router::add('^book/(?P<alias>[a-z0-9-]+)$', ['controller' => 'Main', 'action' => 'book']);

//default routes
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');



Router::dispatch($query);