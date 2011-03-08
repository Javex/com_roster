<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
require_once( dirname(__FILE__).DS.'simple_html_dom.php' );
jimport('joomla.application.component.model');

class RosterModelUpdate extends JModel
{
	var $_update;
	var $_players_array;
	var $_races = array("", "", "Orc", "", "", "Undead", "Tauren", "", "Troll", "Goblin", "BloodElf");
	var $_classes = array("", "Warrior", "Paladin", "Hunter", "Rogue", "Priest", "DK", "Shaman", "Mage", "Warlock", "", "Druid");
	var $_newPlayers;
	var $_roles;

	function getUpdate()
	{
		//standard settings for armory update:
		$max_rank = 6;
		$rank_names = array( "Gildenbank", "Gildenrat", "Offizier", "Offitwink", "Veteran", "Member", "Trial");
		
		
		//get the current players
		$db =& JFactory::getDBO();
		$query = 'SELECT name,race,guild_rank,sex FROM #__roster_data';
		$db->setQuery($query);
		$db->query();
		$result = $db->loadRowList();
		
		//get the list of all players for each rank to compare them
		foreach($rank_names as $i=>$rank)
		{
			if($i != 3 && $i != 0)
			{
				$players[$rank] = RosterModelUpdate::getPlayers($rank,$i);
				/*echo $rank.": ";
				foreach($players[$rank] as $player)
				{
					echo $player.", ";
				}
				echo "<br>";*/
			}
		}
		
		foreach($result as $i=>$player)
		{
			$names[$i] =& $player[0];
		}
		
		foreach($players as $rank=>$players_rank)
		{
			foreach($players_rank as $player)
			{
				//check for new player
				if(!in_array($player, $names))
				{
					$this->_newPlayers[sizeof($this->_newPlayers)] = RosterModelUpdate::getNewPlayer($player,$rank);
					echo $this->_newPlayers[sizeof($this->_newPlayers)+1];
					//before adding the new player: Get his Spec from the User (maybe complicated!). Also may need to get iLvl!
					//RosterModelUpdate::saveNewPlayer($newPlayer);
				}
			}
		}
		return $this->_newPlayers;
	}
	
	function getPlayers($rank,$i)
	{
		$armory_url = "http://eu.battle.net/wow/en/guild/taerar/saliva%20amphora/roster?view=&name=&minLvl=85&maxLvl=85&race=&class=&rank=$i";
		$players_html = file_get_html($armory_url)->find('div[id=roster] tbody tr');
		$players = array();
		foreach ($players_html as $player)
		{
			if($name = $player->find('td[class=name] a'))
			{
				$players[sizeof($players)] = $name[0]->innertext;
				$this->_players_array[$name[0]->innertext] = $player;
			}
		}
		return $players;
	}
	
	function getNewPlayer($player,$rank)
	{
		$race_tmp = $this->_players_array[$player]->find('td[class=race] img');
		$race_src = $race_tmp[0]->src;
		$race = $this->_races[substr($race_src,(strpos($race_src, "race/"))+5,strPos($race_src,"-")-(strpos($race_src, "race/")+5))];
		$sex = substr($race_src,(strpos($race_src,"-")+1),1);
		
		$class_tmp = $this->_players_array[$player]->find('td[class=cls] img');
		$class_src = $class_tmp[0]->src;
		$start = strpos($class_src,"class/")+6;
		$end = strpos($class_src,".gif");
		$diff = $end-$start;
		$class = $this->_classes[substr($class_src,$start,$diff)];
		//echo $player.": ".$race.": ".$sex.": ".$class."<br>";
		//echo $race;
		
		$newPlayer["Name"] = $player;
		$newPlayer["Race"] = $race;
		$newPlayer["Class"] = $class;
		$newPlayer["Sex"] = $sex;	
		$newPlayer["Rank"] = $rank;
		$newPlayer["Spec"] = "";
		$newPlayer["New"] = true;
		
		return $newPlayer;
	}
	
	function saveNewPlayer($newPlayer)
	{
		$db =& JFactory::getDBO();
		$query = 'INSERT INTO #__roster_data (name, spec, player_class, race, sex, guild_rank, item_level) VALUES ("'.$newPlayer["Name"].'", "'.$newPlayer["Spec"].'", "'.$newPlayer["Class"].'", "'.$newPlayer["Race"].'", "'.$newPlayer["Sex"].'", "'.$newPlayer["Rank"].'", "0")';
		$db->setQuery($query);
		if($db->query()){echo "Yay!";}
		else{echo $db->getErrorMsg();}
	}
	
	function getRoleSettings()
	{
		$query = 'SELECT setting_value,class_name FROM #__roster_settings WHERE `setting_type` = "role"';
		$this->_roles = $this->_getList($query);
		foreach($this->_roles as $role)
		{
			$count = sizeof($roles[$role->class_name]);
			$roles[$role->class_name][$count] = $role->setting_value;
		}
		
		return $roles;
	}
	function store()
	{
		$row =& $this->getTable();
		$data = JRequest::get('post');
		
		$player_number = (sizeof($data)-4)/6;
		
		for($i=0;$i<$player_number;$i++)
		{
			$player['name'] = $data['name'.$i];
			$player['player_class'] = $data['class'.$i];
			$player['spec'] = $data['spec'.$i];
			$player['race'] = $data['race'.$i];
			$player['sex'] = $data['sex'.$i];
			$player['guild_rank'] = $data['rank'.$i];
			
			echo $player['name'].$player['class'].$player['spec'].$player['race'].$player['sex'].$player['rank'];
			if(!$row->bind($player)) {
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
		}
		return true;
	}
}

?>