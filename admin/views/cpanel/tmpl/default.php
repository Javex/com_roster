<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
?>
<table class="adminform"><tr><td width="55%" valign="top">

<div id="cpanel">
    <div style="float:left;">
            <div class="icon">
                <a href="index.php?option=com_roster&view=roster" >
                <img src="components/com_roster/images/roster.png" height="50px" width="50px">
                <span><?php echo JText::_('Roster'); ?></span>
                </a>
            </div>
    </div>
	<div style="float:left;">
            <div class="icon">
                <a href="index.php?option=com_roster&view=classes" >
                <img src="components/com_roster/images/classes.png" height="50px" width="50px">
                <span><?php echo JText::_('Classes'); ?></span>
                </a>
            </div>
    </div>
	<div style="float:left;">
            <div class="icon">
                <a href="index.php?option=com_roster&view=races" >
                <img src="components/com_roster/images/races.png" height="50px" width="50px">
                <span><?php echo JText::_('Races'); ?></span>
                </a>
            </div>
    </div>
	<div style="float:left;">
            <div class="icon">
                <a href="index.php?option=com_roster&view=ranks" >
                <img src="components/com_roster/images/ranks.png" height="50px" width="50px">
                <span><?php echo JText::_('Ranks'); ?></span>
                </a>
            </div>
    </div>
	<div style="float:left;">
            <div class="icon">
                <a href="index.php?option=com_roster&view=roles" >
                <img src="components/com_roster/images/roles.png" height="50px" width="50px">
                <span><?php echo JText::_('Roles'); ?></span>
                </a>
            </div>
    </div>

</div>

<td width="45%" valign="center">
<div style="height:20px;padding:20px;text-align:center;border:2px dotted #A335EE;width:200px;">
<a href="index.php?option=com_roster&controller=update&task=update" style="color:#A335EE;font-size:16px;text-decoration:underline;">Perform Roster Update</a>
</div>
</td></tr></table>