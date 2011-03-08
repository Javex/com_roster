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
                <?php echo JText::_( 'Type' ); ?>
            </th>
            <th>
                <?php echo JText::_( 'Value' ); ?>
            </th>
			<th>
                <?php echo JText::_( 'Color' ); ?>
            </th>
			<th>
                <?php echo JText::_( 'Class Name' ); ?>
            </th>
			<th width="3">
                <?php echo JText::_( 'ID' ); ?>
            </th>
        </tr>            
    </thead>
    <?php
    $k = 0;
    foreach ($this->items as $i=>$row)
    {
		$link = JRoute::_( 'index.php?option=com_roster&controller=setting&task=edit&cid[]='. $row->id );
        ?>
        <tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo JHTML::_('grid.id',   $i, $row->id ); ?>
            </td>
            <td>
                <a href="<?php echo $link; ?>"><?php echo ucfirst($row->setting_type); ?></a>
            </td>
            <td>
                <?php echo $row->setting_value; ?>
            </td>
			<td>
                <?php echo '<span style="color:#'.$row->color_show.'">'.$row->color.'</span>'; ?>
            </td>
			<td>
                <?php echo $row->class_name; ?>
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
<input type="hidden" name="controller" value="setting" />
 
</form>
