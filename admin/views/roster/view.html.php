<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewRoster extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Roster Manager'),'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		
		$items =& $this->get('Roster');
		$colors =& $this->get('Colors');
		$this->assignRef('items',$items);
		$this->assignRef('colors',$colors);
		
		parent::display($tpl);
	}
}

?>