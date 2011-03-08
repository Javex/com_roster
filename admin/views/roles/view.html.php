<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewRoles extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Roles for each Class'),'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		$roles =& $this->get('Roles');
		$colors =& $this->get('Colors');
		$this->assignRef('roles',$roles);
		$this->assignRef('colors',$colors);
		
		parent::display($tpl);
	}
}

?>