<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class RosterModelRoster extends JModel
{
	var $_data;
	var $_settings;
	var $_color_settings;
	

	function getRoster()
	{		
		$query = 'SELECT name,spec,player_class,race,sex,guild_rank,id FROM #__roster_data';
		$this->_settings = $this->_getList($query);
		foreach($this->_settings as $setting)
		{
			if($setting->sex == 0) {
				$setting->sex == "Male";
			} else {
				$setting->sex == "Female";
			}
		}
		return $this->_settings;
	}
	
	function getColors()
	{
		$query = 'SELECT setting_type,setting_value,color FROM #__roster_settings';
		$this->_color_settings = $this->_getList($query);
			
		foreach($this->_color_settings as $setting)
		{
			if($setting->color == "FFFFFF") {
				$colors[$setting->setting_type][$setting->setting_value] = "666666";
			} elseif($setting->color == "FFF569") {
				$colors[$setting->setting_type][$setting->setting_value] = "CFC200";
				
			} else {
				$colors[$setting->setting_type][$setting->setting_value] = $setting->color;
				
			}
		}
		return $colors;
	}
	
}

?>