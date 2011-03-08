<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );
 
jimport( 'joomla.application.component.view' );

class RosterViewSetting extends JView
{
        function display($tpl = null)
        {
                $setting        =& $this->get('Data');
				$classes =& $this->get('Classes');
				$types =& $this->get('SettingTypes');
                $isNew         = ($setting->id < 1);
				$task = JRequest::getVar('task','post');
 
                $text = $isNew ? JText::_( 'New' ) : JText::_( 'Edit' );
                JToolBarHelper::title(   JText::_( 'Setting' ).': <small><small>[ ' . $text.' ]</small></small>' );
                JToolBarHelper::save();
                if ($isNew)  {
                        JToolBarHelper::cancel();
                } else {
                        // for existing items the button is renamed `close`
                        JToolBarHelper::cancel( 'cancel', 'Close' );
                }
		
                $this->assignRef('setting',$setting);
				$this->assignRef('classes',$classes);
				$this->assignRef('task',$task);
				$this->assignRef('types',$types);
 
                parent::display($tpl);
        }
}
