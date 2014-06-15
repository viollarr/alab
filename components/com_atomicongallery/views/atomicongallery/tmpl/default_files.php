<?php defined('_JEXEC') or die('Restricted access'); ?>

<?php foreach($this->files as $item) : ?>
<div class="file">
	<div class="thumbnail" style="background-image: url('<?php echo AtomiconGallery::cssImage($item['thumbnail']) ?>');">
		<a href="<?php echo $item['url']; ?>" rel="<?php echo $this->rel;?>" title="<?php echo htmlspecialchars($item['description']);?>">
			<img src="<?php echo $this->cleargif;?>">
		</a>
	</div>
</div>
<?php endforeach; ?>
<div class="clearfix"></div>