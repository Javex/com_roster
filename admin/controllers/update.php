<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class RosterControllerUpdate extends RosterController
{
	function __construct()
	{
		parent::__construct();
	}
	
	function update()
	{
		JRequest::setVar( 'view', 'update' );
		JRequest::setVar( 'layout', 'form'  );
		JRequest::setVar('hidemainmenu', 1);
		parent::display();
	}
	
	function save()
	{
		$model = $this->getModel('update');
		
		if($model->store()) {
			$msg = JText::_('Update performed. Check the Roster for errors!');
		} else {
			$msg = JText::_('Error Performing Update!');
		}
		$link = 'index.php?option=com_roster&view=cpanel';
		$this->setRedirect($link,$msg);
	}
	
	
	function cancel()
	{
		$msg = JText::_('Update Cancelled');
		$link = 'index.php?option=com_roster&view=cpanel';
		$this->setRedirect($link,$msg);
	}
}

?>