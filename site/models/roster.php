<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
//require_once( dirname(__FILE__).DS.'simple_html_dom.php' );
jimport('joomla.application.component.model');

class RosterModelRoster extends JModel
{
	function getGreeting()
	{
		$db =& JFactory::getDBO();
		
		$query = 'SELECT greeting FROM #_roster_data';
		$db->setQuery($query);
		$greeting = $db->loadResult();
		
		return $greeting;
	}
	
	function getClasses()
	{
		$query = 'SELECT setting_value,color FROM #__roster_settings WHERE `setting_type` = "class_name"';
		$this->_classes = $this->_getList($query);
		return $this->_classes;
	}
	
	function getPlayers()
	{
		$db =& JFactory::getDBO();
		/*$query = 'SELECT setting_value FROM #__roster_settings WHERE `setting_type` = "item_level_timestamp"';
		$db->setQuery($query);
		$db->Query();
		$timestamp = $db->loadResult();*/
		
		/*Some Admin Stuff*/
		//$user = JFactory::getUser();
		
		

		$query = 'SELECT name,spec,race,sex,guild_rank,player_class,item_level FROM #__roster_data';
		$this->_players = $this->_getList($query);
		//if(time()-$timestamp>86400 && date("D" == "Wed")){$update=true;}
		//$error_log = fopen("/var/www/vhosts/saliva-amphora.de/httpdocs/tmp/roster_error.log","a");
		//$access_log = fopen("/var/www/vhosts/saliva-amphora.de/httpdocs/tmp/roster_access.log","a");
		//$log_time = date("d.m.Y H:i:s: ");
		foreach($this->_players as $i=>$player)
		{
			$players[$i]["Name"] = $player->name;
			$players[$i]["Spec"] = $player->spec;
			$players[$i]["Race"] = $player->race;
			$players[$i]["Sex"] = $player->sex;
			$players[$i]["Class"] = $player->player_class;
			$players[$i]["Rank"] = $player->guild_rank;
			/*if($update) {
				$players[$i]["Item_Level"] = RosterModelRoster::updateItemLevel($player->name);
				if($players[$i]["Item_Level"]) {
					$done++;
					fwrite($access_log,$log_time."Successfully updated ".$players[$i]["Name"]."!\n");
				} else {
					fwrite($error_log,$log_time."Error updating $players[$i]['Name']!\n");
					$players[$i]["Item_Level"] = $player->item_level;
				}
			} else {
				$players[$i]["Item_Level"] = $player->item_level;
			}*/
		}
		
		/*if($done == sizeof($players) && $update) {
			$db = JFactory::getDBO();
			$query = "UPDATE jos_roster_settings SET setting_value = '".time()."' WHERE jos_roster_settings.setting_type = 'item_level_timestamp'";
			$db->setQuery($query);
			fwrite($access_log,$log_time."The update was successful!\n");
			if(!$db->query()) {
				fwrite($error_log,$log_time."Error saving the timestamp while executing the query!\n");
			}
		} elseif(!$update) {
			fwrite($error_log,$log_time."No update performed!\n");
		} else {
			fwrite($error_log,$log_time."It seems not all players were updated!\n");
		}
		fclose($error_log);*/
		
		return $players;
	}
	
	function getRankColors()
	{
		$query = 'SELECT setting_value,color FROM #__roster_settings WHERE `setting_type` = "guild_rank"';
		$this->_colors = $this->_getList($query);
		
		foreach($this->_colors as $color)
		{
			$colors[$color->setting_value] = $color->color;
		}
		return $colors;
	}
	
	function updateItemLevel($name)
	{
		$url = "http://eu.battle.net/wow/de/character/Taerar/$name/simple";			
		$player_armory_html = file_get_html($url);
		$iLvl_span = $player_armory_html->find('span[class=equipped]');
		if(sizeof($iLvl_span)==0) {
			return false;
		}
		$iLvl = $iLvl_span[0]->innertext;
		
		//save the result;
		$db = JFactory::getDBO();
		$query = "UPDATE jos_roster_data SET item_level = '$iLvl' WHERE jos_roster_data.name = '$name'";
		$db->setQuery($query);
		$db->query();
		
		$player_armory_html->clear();
		unset($player_armory_html,$url,$iLvl_span);
		return $iLvl;
	}
}

?>