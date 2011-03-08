<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.model');

class RosterModelSetting extends JModel
{
	var $_id;
	var $_data;
	var $_settings;
	
	function __construct()
	{
		parent::__construct();
		
		$array = JRequest::getVar('cid',0,'','array');
		$this->setID((int)$array[0]);
	}
	
	function setId($id)
	{		
		$this->_id = $id;
		$this->_data = null;
	}
	
	function &getData()
	{
		if(empty($this->_data)) {
			$query = 'SELECT * FROM #__roster_settings WHERE id = '.$this->_id;
			$this->_db->setQuery($query);
			$this->_data = $this->_db->loadObject();
		}
		if(!$this->_data) {
			$this->_data = new StdClass();
			$this->_data->id = 0;
			$this->_data->setting_type = '';
			$this->_data->setting_value = '';
			$this->_data->color = '';
			$this->_data->class_name = '';
		}
		return $this->_data;
	}
	
	function &getClasses()
	{
		$query = 'SELECT setting_value FROM #__roster_settings WHERE `setting_type` = "class_name" ORDER BY `class_name` ASC';
		$this->_settings = $this->_getList($query);
				
		return $this->_settings;
	}
	
	function &getSettingTypes()
	{
		$query = 'SELECT setting_type FROM #__roster_settings';
		$this->_settings = $this->_getList($query);
		
		$settingTypes = array();
		foreach($this->_settings as $setting)
		{
			if(!in_array($setting->setting_type,$settingTypes))
			{
				$settingTypes[count($settingTypes)] = $setting->setting_type;
			}
		}
		
		return $settingTypes;
	}
	
	/*function &getSettings()
	{
		$query = 'SELECT setting_type,setting_value,class_name FROM #__roster_settings ORDER BY `class_name` ASC';
		$this->_settings = $this->_getList($query);
		
		foreach($this->_settings as $setting)
		{
			if($setting->setting_type == 'race')
			{
				$setting->class_name = str_replace(',',' ',$setting->class_name);
			}
		}
				
		return $this->_settings;
	}*/
	
	function store()
	{
		$row =& $this->getTable();
		
		$data = JRequest::get('post');
		
		if(!$row->bind($data)) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		
		if(!$row->check()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		
		if(!$row->store()) {
			$this->setError($this->_db->getErrorMsg());
			return false;
		}
		
		return true;
	}
	
	function delete()
	{
		$cids = JRequest::getVar('cid',array(0),'post','array');
		$row =& $this->getTable();
		
		foreach($cids as $cid)
		{
			if(!$row->delete($cid)) {
				$this->setError($row->getErrorMsg());
				return false;
			}
		}
		return true;
	}
	
}
?>