<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        <tr>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->items ); ?>);" />
			</th>
            <th>
                <?php echo JText::_( 'Name' ); ?>
            </th>
			<th>
                <?php echo JText::_( 'Spec' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Class' ); ?>
            </th>
			<th>
                <?php echo JText::_( 'Race' ); ?>
            </th>
			<th>
                <?php echo JText::_( 'Sex' ); ?>
            </th>
			<th>
                <?php echo JText::_( 'Rank' ); ?>
            </th>
			<th width="5">
                <?php echo JText::_( 'ID' ); ?>
            </th>
        </tr>            
    </thead>
    <?php
    $k = 0;
    foreach ($this->items as $i => $row)
    {
		$link = JRoute::_( 'index.php?option=com_roster&controller=player&task=edit&cid[]='. $row->id );
        ?>
        <tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo JHTML::_('grid.id',   $i, $row->id ); ?>
            </td>
            <td>
                 <a href="<?php echo $link; ?>"><?php echo $row->name; ?></a>
            </td>
            <td>
                <?php echo JText::_($row->spec); ?>
            </td>
			<td>
                <?php echo '<span style="color:#'.$this->colors["class_name"][$row->player_class].'">'.JText::_($row->player_class).'</span>'; ?>
            </td>
			<td>
                <?php echo JText::_($row->race); ?>
            </td>
			<td>
                <?php echo ($row->sex) ?  JText::_('Female') : JText::_('Male'); ?>
            </td>
			<td>
			    <?php echo '<span style="color:#'.$this->colors["guild_rank"][$row->guild_rank].'">'.$row->guild_rank.'</span>'; ?>
            </td>
			<td>
                <?php echo $row->id; ?>
            </td>
        </tr>
        <?php
        $k = 1 - $k;
    }
    ?>
    </table>
</div>
 
<input type="hidden" name="option" value="com_roster" />
<input type="hidden" name="task" value="" />
<input type="hidden" name="boxchecked" value="0" />
<input type="hidden" name="controller" value="player" />
 
</form>
