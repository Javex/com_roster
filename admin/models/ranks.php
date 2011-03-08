<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class RosterModelRanks extends JModel
{
	function getRanks()
	{
		$query = 'SELECT setting_value,color,id FROM #__roster_settings WHERE `setting_type` = "guild_rank"';
		$this->_ranks = $this->_getList($query);
		return $this->_ranks;
	}
	
}

?>