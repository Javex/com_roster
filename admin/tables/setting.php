<?php
// No direct access
defined('_JEXEC') or die('Restricted access');

class TableSetting extends JTable
{
	var $id = null;
	var $setting_type = null;
	var $setting_value = null;
	var $color = 0;
	var $class_name = null;
	
	function __construct(&$db) {
		parent::__construct('#__roster_settings','id',$db);
	}
}
?>