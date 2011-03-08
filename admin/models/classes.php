<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class RosterModelClasses extends JModel
{
	function getClasses()
	{
		$query = 'SELECT setting_value,color,id FROM #__roster_settings WHERE `setting_type` = "class_name" ORDER BY `setting_value` ASC';
		$this->_classes = $this->_getList($query);
		return $this->_classes;
	}
	
}

?>