<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class RosterControllerPlayer extends RosterController
{
/**
 * constructor (registers additional tasks to methods)
 * @return void
 */
	function __construct()
	{
		parent::__construct();
	
		// Register Extra tasks
		$this->registerTask( 'add', 'edit' );
	}

	function edit()
	{
		JRequest::setVar('view','player');
		JRequest::setVar('layout','form');
		JRequest::setVar('hidemainmenu',1);
		
		parent::display();
	}
	
	function save()
	{
		$model = $this->getModel('player');
		
		if($model->store()) {
			$msg = JText::_('Player Saved!');
		} else {
			$msg = JText::_('Error Saving Player');
		}
		
		$link = 'index.php?option=com_roster&view=roster';
		$this->setRedirect($link,$msg);
	}
	
	function remove()
	{
		$model = $this->getModel('player');
		
		if($model->delete()) {
			$msg = JText::_('Player(s) deleted!');
		} else {
			$msg = JText::_('Error: One or More Players could not be deleted!');
		}
		
		$link = 'index.php?option=com_roster&view=roster';
		$this->setRedirect($link,$msg);
	}
	
	function cancel()
	{
		$msg = JText::_('Operation Cancelled');
		$link = 'index.php?option=com_roster&view=roster';
		$this->setRedirect($link,$msg);
	}
}
?>