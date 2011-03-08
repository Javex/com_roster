<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

class RosterControllerSetting extends RosterController
{
        
        function __construct()
        {
                parent::__construct();
                $this->registerTask( 'add'  ,        'edit' );
        }
		
        function edit()
        {
                JRequest::setVar( 'view', 'setting' );
                JRequest::setVar( 'layout', 'form'  );
                JRequest::setVar('hidemainmenu', 1);
 
                parent::display();
        }
		
		
	function save()
	{
		$model = $this->getModel('setting');
		
		if($model->store()) {
			$msg = JText::_('Setting Saved!');
		} else {
			$msg = JText::_('Error Saving Setting');
		}
		
		$link = 'index.php?option=com_roster&view=settings';
		$this->setRedirect($link,$msg);
	}
	
	function remove()
	{
		$model = $this->getModel('player');
		
		if($model->delete()) {
			$msg = JText::_('Setting(s) deleted!');
		} else {
			$msg = JText::_('Error: One or More Settings could not be deleted!');
		}
		
		$link = 'index.php?option=com_roster&view=settings';
		$this->setRedirect($link,$msg);
	}
	
	function cancel()
	{
		$msg = JText::_('Operation Cancelled');
		$link = 'index.php?option=com_roster&view=settings';
		$this->setRedirect($link,$msg);
	}
}

?>