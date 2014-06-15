<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php foreach($this->folders as $item) : ?>

<?php
    //cancel rendering of up; if folder parameter is given
	if ($item['up'] && $this->folder_param!='') {
		if ($this->folder_param == $this->folder) {
			continue;
		}
	}
?>

<?php $folder_url = JRoute::_('index.php?option=com_atomicongallery&folder=' . $item['folder']); ?>

<div class="folder<?php echo $item['up'] ? '_up' : ''; ?>" onclick="document.location='<?php echo $folder_url;?>';">

<?php if ($item['up']) : ?>

	    <a href="<?php echo $folder_url?>"><?php echo JText::_('Back');?></a>

<?php else : ?>

	<!--<div class="thumbnail" style="background-image: url('<?php echo AtomiconGallery::cssImage($item['thumbnail']); ?>');">
		<a href="<?php echo $folder_url;?>">
			<img src="<?php echo $this->cleargif;?>" width="100" height="100">
		</a>
	</div>-->
	
	<div class="info">
	    <div class="title">
		    <a href="<?php echo $folder_url;?>">
				<?php echo htmlspecialchars($item['title']); ?>
			</a>
		</div>
		<div class="description">
		    <?php echo nl2br(htmlspecialchars($item['description'])); ?>
		</div>
	</div>
	
<?php endif; ?>
	<div class="clearfix"></div>
</div>
<?php endforeach; ?>