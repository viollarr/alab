<?php
/*--------------------------------------------------------------
# Design by Joomlaplates.com - 2008
# Copyright (C) 2007 Joomlaplates.com All Rights Reserved.
# License: Copyrighted Commercial Software
# Website: http://www.joomlaplates.com
# Support: info@joomlaplates.com 
---------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted index access' );
JHTML::_('behavior.mootools');
$app = JFactory::getApplication();
?>

<!DOCTYPE html>
<html xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
<jdoc:include type="head" />
<link rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/system/css/general.css" type="text/css" />

<!-- Loads Template Layout CSS -->
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/layout.css" type="text/css" media="screen, projection" />
	
<!-- Loads Joomla base/default classes-->	
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/template.css" type="text/css" media="screen, projection" />

<!-- Loads left main right -->	
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/<?php echo $this->params->get('template_layout'); ?>.css" type="text/css" media="screen, projection" />

<!-- Loads left right menu-->	
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/menu.css" type="text/css" media="screen, projection" />

<!-- Loads Suckerfish -->	
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/suckerfish.css" type="text/css" media="screen, projection" />

<!-- Loads Module Styles -->	
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/module.css" type="text/css" media="screen, projection" />

<!-- Loads Typo Styles -->	
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/jp_typo.css" type="text/css" media="screen, projection" />

<?php if($this->params->get('cssThree') == 1) : ?>
<!-- Loads CSS3 file with some nice modern effects-->	
	<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/css3.css" type="text/css" media="screen, projection" />
<?php endif; ?>	
<?php if($this->params->get('cssThree') == 0) : ?>
	<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/css3_off.css" type="text/css" media="screen, projection" />
<?php endif; ?>	

<!--[if IE 7]>
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/ie7.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/css3_off.css" type="text/css" media="screen, projection">
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/css/css3_off.css" type="text/css" media="screen, projection">
<![endif]-->

<?php if($this->params->get('slimbox') == 1) : ?>
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/slimbox.js"></script>
<?php endif; ?>

<?php if($this->countModules('header1 or header2 or header3 or header4 or header5 or header6 or header7 or header8 or header9 or header10 or header11 or header12')) : ?>
<!--Starting Slider Script-->
<script type="text/javascript" src="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/js/slide.js"></script>
<script type="text/javascript">
window.addEvent('domready',function(){
		var hs4 = new noobSlide({
			box: $('box'),
			items: $ES('div','box'),
			<?php if($this->params->get('sliderAuto') == 1) : ?>
			autoPlay: true,
			<?php endif; ?>
			interval: <?php echo $this->params->get('sliderTime'); ?>,
			<?php if($this->params->get('sliderType') == vertical) : ?>
			mode: 'vertical',
			size: 450,
			<?php else: ?>
			size: <?php echo $this->params->get('slider_width'); ?>,
			<?php endif; ?>
			<?php if($this->params->get('bounce') == bounce) : ?>
			fxOptions: {
				duration: 1000,
				transition: Fx.Transitions.Bounce.easeOut,
				wait: false
			},
			<?php endif; ?>
			buttons: {
				previous: $('prev'),
				play: $('play'),
				stop: $('stop'),
				next: $('next')
			}
		});	});
	</script>
<?php endif; ?>
<?php if($this->countModules('search + topmenu') == 0) { ?>
<style type="text/css" media="screen">
   .function_outer { display:none }
</style>
<?php } ?>


<style type="text/css" media="screen">
   #left, #right  { width:<?php echo $this->params->get('module_width'); ?>; }
   .template_width { width:<?php echo $this->params->get('template_width'); ?>; }
</style>
<?php if($this->countModules('user1 and user2 and user3') == 1) { ?>
<style type="text/css" media="screen">
   .usertop { width:33%}
</style>
<?php } ?>

<?php if($this->countModules('user1 xor user2 xor user3') == 0) { ?>
<style type="text/css" media="screen">
   .usertop { width:50%}
</style>
<?php } ?>
<?php if($this->countModules('user4 and user5 and user6') == 1) { ?>
<style type="text/css" media="screen">
   .userbottom { width:33%}
</style>
<?php } ?>

<?php if($this->countModules('user4 xor user5 xor user6') == 0) { ?>
<style type="text/css" media="screen">
   .userbottom { width:50%}
</style>
<?php } ?>

<!-- Add slider height via CSS and primary color-->
<style type="text/css">
/*Adding height from template config to header box and mask*/
#box div, .mask1{width:<?php echo $this->params->get('slider_width'); ?>px;height:<?php echo $this->params->get('sliderHeight'); ?>px;}
</style>

<!--Starting Suckerfish Script-->
<?php if($this->params->get('showSuckerfish') == 1) : ?>
<script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/moomenu.js"></script>
<?php endif; ?>
<!--Suckerfish Script End-->

<!--Loads FavIcon-->
<link rel="shortcut icon" href="<?php echo $this->baseurl;?>/templates/<?php echo $this->template;?>/images/favicon.ico" />  
</head>
<body>

<div class="function_outer"> <!-- This container includes the whole function area-->
	<div class="function_inner template_width"> 
			<?php if($this->countModules('search')) : ?>
				<div class="search">
					<jdoc:include type="modules" name="search" style="raw" />	
				</div>
			<?php endif; ?>
			<?php if($this->countModules('topmenu')) : ?>
				<div class="topmenu">
					<jdoc:include type="modules" name="topmenu" style="raw" />	
				</div>
			<?php endif; ?>
	<div class="jpclear"></div><!--AUTO HEIGH FIX FOR FIREFOX -->
	</div> <!-- div.function_inner ends here-->
</div> <!-- div.function_outer ends here-->

<div class="wrapper">


<div class="top_outer"> <!-- This container includes the whole top area-->
	<div class="top_inner template_width"> 

<!-- ****************** Top Area with Logo, topmenu etc.****************** -->
		<?php require_once('includes/logo_area.php'); ?>
<!-- ****************** Suckerfish etc.****************** -->
<!--BEGINN SUCKERFISH -->
		<?php if($this->countModules('suckerfish')) : ?>
		<div id="suckerfish" class="dropdown"><jdoc:include type="modules" name="suckerfish" style="raw" /></div>
		<div class="menu_shadow"></div>
		<?php endif; ?>
<!--END SUCKERFISH -->
	<div class="jpclear"></div><!--AUTO HEIGH FIX FOR FIREFOX -->
	</div> <!-- div.top_inner ends here-->
</div> <!-- div.top_outer ends here-->

<!-- ****************** Header Area with Header image, top modules etc. ****************** -->
<?php if($this->countModules('header1 or header2 or header3 or header4 or header5 or header6 or header7 or header8 or header9 or header10 or header11 or header12 or header')) : ?>
<div class="header_outer"> <!-- This container includes header area-->
	<div class="header_inner template_width"> 
			<!-- Including header area -->
			<?php require_once('includes/header.php'); ?>
	<div class="jpclear"></div>
	<?php if($this->countModules('user1 + user2 + user3') == 0) : ?> 
	<div class="menu_shadow" style="margin-top:20px;"></div>
	<?php endif; ?>
	</div> 
</div>
<?php endif; ?>
<div class="main_outer"> 
	<div class="main_inner template_width" > 
	  <div class="main">
					<div class="container">
					<?php if($this->countModules('user1 or user2 or user3')) : ?> 	
					<!-- Including top content area -->
					<?php require_once('includes/top_module.php'); ?>
					<?php endif; ?>	
			
					<!-- Including inner content area -->
					<?php require_once('includes/innercontent.php'); ?>
			
					<?php if($this->countModules('user4 or user5 or user6')) : ?> 	
					<!-- Including bottom content area-->
					<?php require_once('includes/bottom_module.php'); ?>
					<?php endif; ?>
					</div>
	  </div>
		<div class="jpclear"></div>
	</div>
</div>


<div class="footer_outer">
			<?php require_once('includes/footer_module.php'); ?>
	<div class="jpclear"></div>
</div>
<?php $TemplateName = ViewTemplateName(); ?>
<?php if($this->countModules('footer')) : ?><div id="footer"><jdoc:include type="modules" name="footer" style="rounded" /></div><?php endif; ?>
	
	<div class="jpclear"></div>
<jdoc:include type="modules" name="debug" style="" />


</body>
</html>