<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

jimport( 'joomla.application.component.view' );

class RosterViewPlayer extends JView
{
	function display($tpl = null)
	{
		$player =& $this->get('Data');
		$settings =& $this->get('Settings');
		$isNew = ($player->id < 1);
		
		$text = $isNew ? JText::_('New') : JText::_('Edit');
		JToolBarHelper::title(JText::_('Player:').': <small><small>[ '.$text.']</small></small>');
		JToolBarHelper::save();
		if($isNew) {
			JToolBarHelper::cancel();
		} else {
			JToolBarHelper::cancel('cancel','Close');
		}
		
		$this->assignRef('player',$player);
		$this->assignRef('settings',$settings);
		
		parent::display($tpl);
	}
}
?>