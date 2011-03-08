<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewRanks extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Guild Ranks'),'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		$ranks =& $this->get('Ranks');
		$this->assignRef('ranks',$ranks);
		
		parent::display($tpl);
	}
}

?>