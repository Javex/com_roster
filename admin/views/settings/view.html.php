<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewSettings extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Roster Settings'),'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		
		$items =& $this->get('Settings');
		$this->assignRef('items',$items);
		
		parent::display($tpl);
	}
}

?>