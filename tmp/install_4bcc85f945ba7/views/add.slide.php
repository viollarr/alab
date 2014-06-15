<?php

/**
* @author: GavickPro
* @copyright: 2008
**/
	
// no direct access
defined('_JEXEC') or die('Restricted access');

$actual_group = '';
$flag = false; 
$first = false;

?>


<tr>
	<td><?php echo $LANG->SLIDE_NAME; ?></td>
	<td><input type="text" name="name" value="" id="slide_name" /></td>
</tr>
		
<tr>
	<td><?php echo $LANG->SLIDE_IMAGE; ?></td>
	<td><input type="file" name="image" value="" id="slide_image" /></td>
</tr>
		
<tr>
	<td><?php echo $LANG->SLIDE_ACCESS; ?></td>
	<td>
		<select name="access">
			<option value="0" selected="selected"><?php echo $LANG->SLIDE_PUBLIC; ?></option>
			<option value="1"><?php echo $LANG->SLIDE_REGISTRED; ?></option>
			<option value="2"><?php echo $LANG->SLIDE_SPECIAL; ?></option>
		</select>
	</td>
</tr>
		
<tr>
	<td><?php echo $LANG->SLIDE_ARTICLE; ?></td>
	<td>
		<select name="article" id="slide_article">			
			<?php 
				// creating articles list
		        $db =& JFactory::getDBO();	
		        $db->setQuery( 'SELECT a.`id` AS `id` , a.`title` AS `art_title`, k.`title` AS `cat_name` FROM `#__content` AS `a` LEFT JOIN `#__categories` AS `k` ON a.`catid` = k.`id` ORDER BY k.`title` ASC;' );
                //
				foreach($db->loadObjectList() as $art)
				{
					if($actual_group != $art->cat_name)
					{ 
						if($flag) echo '</optgroup>'; else $flag = true;
						echo '<optgroup label="'.$art->cat_name.'">';
						$actual_group = $art->cat_name;
					}
			
					echo '<option '.(!$first ? 'selected="selected"' : '').' value="'.$art->id.'" /> '.$art->art_title;
					if(!$first) $first = true;
				}
				//
		        $db_cats =& JFactory::getDBO();	
		        $db_cats->setQuery( 'SELECT a.`id` AS `id` , a.`title` AS `title` FROM `#__categories` AS `a` ORDER BY a.`title` ASC;' );
				//
				foreach($db_cats->loadObjectList() as $cat)
				{
					echo '<option value="'.($cat->id+200000000).'" /> '.$LANG->CATEGORY_DEFAULT.' '.$cat->title;
				}
				//
		        $db_sec =& JFactory::getDBO();	
		        $db_sec->setQuery( 'SELECT a.`id` AS `id` , a.`title` AS `title` FROM `#__sections` AS `a` ORDER BY a.`title` ASC;' );
		        //
				foreach($db_sec->loadObjectList() as $sec)
				{
					echo '<option value="'.($sec->id+300000000).'" /> '.$LANG->SECTION_DEFAULT.' '.$sec->title;
				}
			?>	
		</select>
	</td>
</tr>

<tr>
	<td><?php echo $LANG->IMAGE_WIDTH; ?></td>
	<td><input type="text" name="mediumThumbX" value="0" id="group_width" size="5" maxlength="4" />px</td>
</tr>
		
<tr>
	<td><?php echo $LANG->IMAGE_HEIGHT; ?></td>
	<td><input type="text" name="mediumThumbY" value="0" id="group_height" size="5" maxlength="4" />px</td>
</tr>

<tr>
	<td><?php echo $LANG->THUMB_WIDTH; ?></td>
	<td><input type="text" name="smallThumbX" value="0" id="thumb_width" size="5" maxlength="4" />px</td>
</tr>
		
<tr>
	<td><?php echo $LANG->THUMB_HEIGHT; ?></td>
	<td><input type="text" name="smallThumbY" value="0" id="thumb_height" size="5" maxlength="4" />px</td>
</tr>		
		
<tr>
	<td><?php echo $LANG->SLIDE_STYLE; ?></td>
	<td>
		<select name="stretch">
			<option value="0" selected="selected"><?php echo $LANG->SLIDE_NONSTRETCH; ?></option>
			<option value="1"><?php echo $LANG->SLIDE_STRETCH; ?></option>
		</select>
	</td>
</tr>	
		
<script type="text/javascript">
	window.addEvent("domready", function(){
		$E("#toolbar-save .toolbar").onclick = function(){
    		var alert_content = '';
				
			if($("slide_name").getValue() == '') alert_content += '<?php echo $LANG->ESLIDENAME;?>'; 
			if($("slide_image").value == '') alert_content += '<?php echo $LANG->EFILE;?>'; 
			if($("slide_article").value == 0) alert_content += '<?php echo $LANG->ECONTENT;?>';
				
			if(isNaN($("group_width").value) || $("group_width").value == '') alert_content += '<?php echo $LANG->EIMAGEWIDTH; ?>'; 
			if(isNaN($("group_height").value) || $("group_height").value == '') alert_content += '<?php echo $LANG->EIMAGEHEIGHT; ?>';
				
			if(isNaN($("thumb_width").value) || $("thumb_width").value == '') alert_content += '<?php echo $LANG->ETHUMBWIDTH; ?>'; 
			if(isNaN($("thumb_height").value) || $("thumb_height").value == '') alert_content += '<?php echo $LANG->ETHUMBHEIGHT; ?>';
				
			(alert_content != '') ? alert(alert_content) : submitbutton('save_slide');
		}
	});
</script>