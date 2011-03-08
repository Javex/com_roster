<?php

// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport('joomla.application.component.view');

class RosterViewClasses extends JView
{
	function display($tpl = null)
	{
		JToolBarHelper::title(JText::_('Class Colors'),'generic.png');
		JToolBarHelper::deleteList();
		JToolBarHelper::editListX();
		JToolBarHelper::addNewX();
		$classes =& $this->get('Classes');
		$this->assignRef('classes',$classes);
		
		parent::display($tpl);
	}
}

?>