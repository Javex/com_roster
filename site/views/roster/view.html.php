<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewRoster extends JView
{
	function display($tpl = null)
	{
		$classes = $this->get('Classes');
		$this->assignRef('classes',$classes);
		
		$players = $this->get('Players');
		$this->assignRef('players',$players);
		
		$rankColors = $this->get('RankColors');
		$this->assignRef('rankColors',$rankColors);
		
		parent::display($tpl);
	}
}

?>