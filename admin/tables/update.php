<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

class TableUpdate extends JTable
{
	var $id = null;
	var $name = null;
	var $spec = null;
	var $player_class = null;
	var $race = null;
	var $sex = null;
	var $guild_rank = null;
	
	function __construct(&$db) {
		parent::__construct('#__roster_data','id',$db);
	}
}
?>