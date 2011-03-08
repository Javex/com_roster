<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewRaces extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Race-Class-Combinations'),'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		$races =& $this->get('Races');
		$this->assignRef('races',$races);
		
		parent::display($tpl);
	}
}

?>