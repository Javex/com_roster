<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$doc =& JFactory::getDocument();
$doc->addScript("/administrator/components/com_roster/js/roster.js");

?>

<form action="index.php" method="post" name="adminForm" id="adminForm">
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo JText::_('Details'); ?></legend>
		<table class="admintable">
			<tr>
				<td width="100" align="right" class="key">
					<label for="setting_value">
						<?php
						switch($this->setting->setting_type)
						{
							case "role":
								echo JText::_('Role');
								break;
							case "race":
								echo JText::_('Race');
								break;
							case "class_name":
								echo JText::_('Class Name');
								break;
							case "guild_rank":
								echo JText::_('Rank Name');
								break;
							default:
								echo JText::_('Setting Value');
								break;
						}
						?>:
					</label>
				</td>
				<td>
					<input class="text_area" type="text" name="setting_value" id="setting_value" size="20" maxlength="100" value="<?php echo $this->setting->setting_value;?>" />
				</td>
			</tr>
			<?php if($this->setting->setting_type == "class_name" || $this->setting->setting_type == "guild_rank" || $this->task == "add") {?>
			<tr>
				<td width="100" align="right" class="key">
					<label for="color">
						<?php echo JText::_('Color');?>:
					</label>
				</td>
				<td>
					<input class="text_area" type="text" name="color" id="color" size="20" maxlength="100" value="<?php if($this->setting->color != null) {echo $this->setting->color;} else { echo 0; }?>" />
				</td>
			</tr>
			<?php } ?>
			<?php if($this->setting->setting_type == "race" || $this->setting->setting_type == "role" || $this->task == "add") {?>
			<tr>
				<td width="100" align="right" class="key">
					<label for="class_name">
						<?php echo JText::_('Class Name');?>:
					</label>
				</td>
				<td>
				<?php if($this->setting->setting_type != "role" || $this->task == "add") {?>
					<input class="text_area" type="text" name="class_name" id="class_name" size="20" maxlength="100" value="<?php echo $this->setting->class_name;?>" />
				<?php }else { ?>
				<?php  ?>
					<select name="class_name" id="class_name">
					<?php
					echo "<option></option>";
					foreach($this->classes as $class)
					{
							if($class->setting_value == $this->setting->class_name)
							{
								echo '<option value="'.$class->setting_value.'" selected>'.$class->setting_value.'</option>';
							} else {
								echo '<option value="'.$class->setting_value.'">'.$class->setting_value.'</option>';
							}
					}
					?>
					</select>
				<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</table>
	</fieldset>
</div>

<div class="clr"></div>
 
<input type="hidden" name="option" value="com_roster" />
<input type="hidden" name="id" value="<?php echo $this->setting->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="setting" />
<input type="hidden" name="setting_type" value="<?php echo $this->setting->setting_type?>" />
</form>