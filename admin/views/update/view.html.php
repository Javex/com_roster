<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewUpdate extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Automatic Roster Update'),'generic.png');
		JToolBarHelper::save();
		JToolBarHelper::cancel();
		$items =& $this->get('Update');
		$roles =& $this->get('RoleSettings');
		$this->assignRef('items',$items);
		$this->assignRef('roles',$roles);
		
		parent::display($tpl);
	}
}

?>