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
					<label for="name">
						<?php echo JText::_('Player Name');?>:
					</label>
				</td>
				<td>
					<input class="text_area" type="text" name="name" id="name" size="20" maxlength="100" value="<?php echo $this->player->name;?>" />
				</td>
			</tr>
			<tr>
				<td width="100" align="right" class="key">
					<label for="player_class">
						<?php echo JText::_('Class');?>:
					</label>
				</td>
				<td>
					<select onChange="javascript:updateAll(false);" name="player_class" id="player_class">
					<?php
					echo "<option></option>";
					foreach($this->settings as $setting)
					{
						if($setting->setting_type == "class_name") {
							
							if($setting->setting_value == $this->player->player_class)
							{
								echo '<option value="'.$setting->setting_value.'" selected>'.$setting->setting_value.'</option>';
							} else {
								echo '<option value="'.$setting->setting_value.'">'.$setting->setting_value.'</option>';
							}
						}
					}
					?>
					</select>
				</td>
			</tr>
			<tr id="specrow">
				<td width="100" align="right" class="key">
					<label for="spec">
						<?php echo JText::_('Spec');?>:
					</label>
				</td>
				<td>
					<select name="spec" id="spec">
						<?php
						echo "<option></option>";
						foreach($this->settings as $setting)
						{
							if($setting->setting_type == "role") {
								
								if($setting->setting_value == $this->player->spec)
								{
									echo '<option value="'.$setting->setting_value.'" selected class="role '.$setting->class_name.'">'.$setting->setting_value.'</option>';
								} else {
									echo '<option value="'.$setting->setting_value.'" class="role '.$setting->class_name.'">'.$setting->setting_value.'</option>';
								}
							}
						}
						?>
					</select>
				</td>
			</tr>
			<tr id="racerow">
				<td width="100" align="right" class="key">
					<label for="race">
						<?php echo JText::_('Race');?>:
					</label>
				</td>
				<td>
					<select name="race" id="race">
						<?php
						echo "<option></option>";
						
						foreach($this->settings as $setting)
						{
							if($setting->setting_type == "race") {
								if($setting->setting_value == $this->player->race)
								{
									echo '<option value="'.$setting->setting_value.'" selected class="races '.$setting->class_name.'">'.$setting->setting_value.'</option>';
								} else {
									echo '<option value="'.$setting->setting_value.'" class="races '.$setting->class_name.'">'.$setting->setting_value.'</option>';
								}
								
							}
						}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td width="100" align="right" class="key">
					<label for="sex">
						<?php echo JText::_('Sex');?>:
					</label>
				</td>
				<td>
					<?php echo JHTML::_( 'select.booleanlist',  'sex', 'class="inputbox"', $this->player->sex, 'Female', 'Male');?>
				</td>
			</tr>
			<tr>
				<td width="100" align="right" class="key">
					<label for="guild_rank">
						<?php echo JText::_('Rank');?>:
					</label>
				</td>
				<td>
					<select name="guild_rank" id="guild_rank">
						<?php
						echo "<option></option>";
						
						foreach($this->settings as $setting)
						{
							if($setting->setting_type == "guild_rank") {
								if($setting->setting_value == $this->player->guild_rank)
								{
									echo '<option value="'.$setting->setting_value.'" selected>'.$setting->setting_value.'</option>';
								} else {
									echo '<option value="'.$setting->setting_value.'">'.$setting->setting_value.'</option>';
								}
								
							}
						}
						?>
				</td>
			</tr>
		</table>
	</fieldset>
</div>

<div class="clr"></div>
 
<input type="hidden" name="option" value="com_roster" />
<input type="hidden" name="id" value="<?php echo $this->player->id; ?>" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="player" />
</form>