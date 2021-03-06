<?php defined('_JEXEC') or die('Restricted access'); ?>
<form action="index.php" method="post" name="adminForm">
<div id="editcell">
    <table class="adminlist">
    <thead>
        <tr>
			<th width="20">
				<input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->ranks ); ?>);" />
			</th>
            <th>
                <?php echo JText::_( 'Rank Name' ); ?>
            </th>
			<th>
                <?php echo JText::_( 'Color' ); ?>
            </th>
			<th width="5">
                <?php echo JText::_( 'ID' ); ?>
            </th>
        </tr>            
    </thead>
    <?php
    $k = 0;
    foreach ($this->ranks as $i => $row)
    {
		$link = JRoute::_( 'index.php?option=com_roster&controller=rank&task=edit&cid[]='. $row->id );
        ?>
        <tr class="<?php echo "row$k"; ?>">
			<td>
				<?php echo JHTML::_('grid.id',   $i, $row->id ); ?>
            </td>
            <td>
                 <a href="<?php echo $link; ?>"><?php echo $row->setting_value; ?></a>
            </td>
            <td>
                <span style="color:#<?php echo ($row->color == "FFFFFF") ? "666666" : (($row->color == "FFF569") ?  "CFC200" : $row->color) ?>"><?php echo $row->color; ?></span>
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
<input type="hidden" name="controller" value="rank" />
 
</form>
