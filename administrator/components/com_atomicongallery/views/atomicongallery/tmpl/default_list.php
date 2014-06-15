<table class="adminlist" cellspacing="1">
<thead>
    <tr>
		<th width="1"><input type="checkbox" onclick="checkAll(<?php echo $this->count ?>);" value="" name="toggle"/></th>
		<th><?php echo JText::_('Name')?></th>
		<th><?php echo JText::_('Description')?></th>
	</tr>
</thead>
<tbody>

<?php
	$count        = 0;
	$count_folder = 0;
	$count_file   = 0;
?>
<?php foreach($this->folders as $item) : ?>
  <tr class="row<?php echo $count&1;?>">
    <td>
		<input <?php echo $item['up'] ? "disabled" : ""; ?> type="checkbox" id="cb<?php echo $count;?>" onclick="isChecked(this.checked);" name="cid[]" value="<?php echo htmlspecialchars($item['title']); ?>">
	</td>
    <td>
        <div class="<?php echo $item['up'] ? 'up': 'folder';?>">
		  <a href="<?php echo AtomiconGallery::getFolderLink($item['folder']);?>">
          	<?php echo htmlspecialchars($item['title']); ?>
          </a>
        </div>
      </div>
    </td>
    <td>
        <?php echo htmlspecialchars($item['description']); ?>
	</td>
  </tr>
<?php $count++; $count_folder++; ?>
<?php endforeach; ?>

<?php foreach($this->files as $item) : ?>
  <tr class="row<?php echo $count&1;?>">
    <td>
		<input type="checkbox" id="cb<?php echo $count;?>" onclick="isChecked(this.checked);" name="cid[]" value="<?php echo htmlspecialchars($item['title']); ?>">
	</td>
    <td>
        <div class="thumbnail">
        <a href="<?php echo $item['url']?>" class="modal">
            <img src="<?php echo $item['thumbnail'];?>" width="20">
		</a>
        </div>
        <div class="file">
          <?php echo htmlspecialchars($item['title']); ?>
        </div>

      </div>
    </td>
    <td>
        <?php echo htmlspecialchars($item['description']); ?>
	</td>
  </tr>
<?php $count++; $count_file ++;?>
<?php endforeach; ?>
</tbody>
</table>