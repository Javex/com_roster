<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once(JPATH_COMPONENT.DS.'controller.php');

if($controller = JRequest::getWord('controller')) {
	$path = JPATH_COMPONENT.DS.'controllers'.DS.$controller.'.php';
	if(file_exists($path)) {
		require_once $path;
	} else {
		$controller = '';
	}
}

$classname = 'RosterController'.$controller;
$controller = new $classname();

$view = JRequest::getVar('view');
if (!$view) {
    $view = 'cpanel';
}
JRequest::setVar('view', $view);

$controller->execute(JRequest::getVar('task'));
$controller->redirect();

?>