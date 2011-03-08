<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class RosterModelSettings extends JModel
{
	var $_data;
	var $_settings;
	

	function getSettings()
	{
		$query = 'SELECT setting_type,setting_value,color,id,class_name FROM #__roster_settings ORDER BY `setting_type` ASC';
		$this->_settings = $this->_getList($query);
		foreach($this->_settings as $setting)
		{
			switch($setting->setting_type)
			{
				case "class_name":
					$setting->setting_type = "Class Name";
					break;
				case "guild_rank":
					$setting->setting_type = "Guild Rank";
					break;
				default:
					break;
			}
			if($setting->color == "FFFFFF") {
				$setting->color_show = "666666";
			} elseif($setting->color == "FFF569") {
				$setting->color_show = "CFC200";
			} else {
				$setting->color_show = $setting->color;
			}
		}
		return $this->_settings;
	}	
}

?>