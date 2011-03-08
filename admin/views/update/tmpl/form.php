<?php
// No direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$doc =& JFactory::getDocument();
$doc->addScript("/administrator/components/com_roster/js/roster.js");

?>
<form action="index.php" method="post" name="adminForm" id="adminForm">
<?php
if(!empty($this->items)):
$i = 0;
foreach($this->items as $row):
?>
<div class="col100">
	<fieldset class="adminform">
		<legend><?php echo $row["Name"]; ?></legend>
		<table class="admintable">
			<tr>
				<td width="100" align="right" class="key">
					<label for="name">
						<?php echo JText::_('Player Name');?>:
					</label>
				</td>
				<td>
					<input class="text_area" type="text" name="name<?php echo $i ?>" class="name" size="20" maxlength="100" value="<?php echo $row["Name"];?>" />
				</td>
			</tr>
			<tr>
				<td width="100" align="right" class="key">
					<label for="player_class">
						<?php echo JText::_('Class');?>:
					</label>
				</td>
				<td>
					<input class="text_area" type="text" name="class<?php echo $i ?>" class="class" size="20" maxlength="100" value="<?php echo $row["Class"];?>" />
				</td>
			</tr>
			<tr class="specrow">
				<td width="100" align="right" class="key">
					<label for="spec">
						<?php echo JText::_('Spec');?>:
					</label>
				</td>
				<td>
					<select name="spec<?php echo $i ?>" class="spec">
						<?php
						echo "<option></option>";
						foreach($this->roles[$row["Class"]] as $role)
						{
							echo '<option value="'.$role.'" class="role">'.$role.'</option>';
						}
						?>
					</select>
				</td>
			</tr>
			<tr class="racerow">
				<td width="100" align="right" class="key">
					<label for="race">
						<?php echo JText::_('Race');?>:
					</label>
				</td>
				<td>
					<input class="text_area" type="text" name="race<?php echo $i ?>" class="race" size="20" maxlength="100" value="<?php echo $row["Race"];?>" />
				</td>
			</tr>
			<tr>
				<td width="100" align="right" class="key">
					<label for="sex">
						<?php echo JText::_('Sex');?>:
					</label>
				</td>
				<td>
					<?php echo JHTML::_( 'select.booleanlist',  'sex'.$i, '', $row["Sex"], 'Female', 'Male');?>
				</td>
			</tr>
			<tr>
				<td width="100" align="right" class="key">
					<label for="guild_rank">
						<?php echo JText::_('Rank');?>:
					</label>
				</td>
				<td>
					<input class="text_area" type="text" name="rank<?php echo $i ?>" class="rank" size="20" maxlength="100" value="<?php echo $row["Rank"];?>" />
				</td>
			</tr>
		</table>
	</fieldset>
</div>

<div class="clr"></div>
<?php
$i++;
endforeach;
else:
	echo 'No new Players were found! Click <a onclick="javascript: submitbutton(\'save\')" href="#">here</a> to get back to Control Panel';
endif;
?>
<input type="hidden" name="option" value="com_roster" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="controller" value="update" />

</form>