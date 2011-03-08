<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$output = '';
$output .= '<div id="page"><h2 class="contentheading">Roster</h2><center><table id="roster" align="center"><tr>';
foreach($this->classes as $i => $setting_value)
{	
	$class = $setting_value->setting_value;
	if($class == "dk") {
		$class_name="DK";
	}
	else {
		$class_name = ucfirst($class);
	}
	//output the class table-data
	$output .= '<td class="class_frame" style="color:#'.$setting_value->color.';">';
	$output .= '<img src="images/wow/classes/'.strtolower($class).'.png">';
	$output .= '<span class="class_name">'.JText::_($class_name).'</span>';
	$output .= '<hr size="3" noshade="noshade" color="#'.$setting_value->color.'">';
	$output .= '<table border="0"><colgroup> <col width="10"> <col width="170"> <col width="170"> <col width="10"> </colgroup><tbody>';
	foreach($this->players as $player)
	{
		if($player["Class"] == $class)
		{
			//echo $player["Class"];
			$output .= '<tr>';
			$output .= '<td><a href="http://eu.battle.net/wow/de/character/Taerar/'.$player["Name"].'/simple" style="color:#'.$setting_value->color.'" target="_blank"><img src="/images/wow/races/'.strtolower($player["Race"]).'_'.$player["Sex"].'.gif"></a></td>';
			$output .= '<td class="player_name"><a href="http://eu.battle.net/wow/de/character/Taerar/'.$player["Name"].'/simple" target="_blank"><span style="color:#'.$setting_value->color.'">'.$player["Name"].(($player["Item_Level"]!= 0) ? ' <span class="iLvl">('.$player["Item_Level"].')</span>' : '').'</span></a></td>';
			$output .= '<td>'.JText::_($player["Spec"]).'</td>';
			$output .= '<td style="color:#'.$this->rankColors[$player["Rank"]].'">'.$player["Rank"].'</td>';
			$output .= '</tr>';
		}
	}
	$output .= '</tbody></table><br>';
	$output .= '</td>';
	
	//output the middle table-data, if its a new row (even number of iterations)
	if($i%2 == 0)
	{
		$output .= '<td class="class_frame_middle">';
		$output .= '</td>';
	} else {
		$output .='</tr>';
		$output .='<tr>';
	}
}
$output .= '</tr></table></center></div>';
echo $output;

?>

