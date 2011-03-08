<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class RosterModelRaces extends JModel
{
	function getRaces()
	{
		$query = 'SELECT setting_value,class_name,id FROM #__roster_settings WHERE `setting_type` = "race" ORDER BY `setting_value` ASC';
		$this->_races = $this->_getList($query);
		foreach($this->_races as $race)
		{
			$race->class_name = str_replace(',','  ',$race->class_name);
		}
		return $this->_races;
	}
	
}

?>