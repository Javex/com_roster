<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class RosterModelRoles extends JModel
{
	function getRoles()
	{
		$query = 'SELECT setting_value,class_name,id FROM #__roster_settings WHERE `setting_type` = "role" ORDER BY `class_name` ASC';
		$this->_ranks = $this->_getList($query);
		return $this->_ranks;
	}
	
	function getColors()
	{
		$query = 'SELECT setting_value,color FROM #__roster_settings WHERE `setting_type` = "class_name"';
		$this->_color_settings = $this->_getList($query);
		$colors = array();
		foreach($this->_color_settings as $color_setting)
		{
			$colors[$color_setting->setting_value] = $color_setting->color;			
		}
		return $colors;
	}	
}

?>