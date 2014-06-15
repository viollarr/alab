<?php 
/**
 * Simple PopUp - Joomla Plugin
 * 
 * @package    Joomla
 * @subpackage Plugin
 * @author Anders Wasén
 * @link http://wasen.net/
 * @license		GNU/GPL, see LICENSE.php
 * plg_simplefilegallery is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

defined('_JEXEC') or die('Restricted access'); // no direct access 

$user = &JFactory::getUser();
		
$document =& JFactory::getDocument();

$document->addStyleSheet( 'plugins/content/simplepopup/spustyle.css' );
$document->addStyleSheet( 'plugins/content/simplepopup/fancybox/jquery.fancybox-1.3.4.css');

$spu_aligntext = $this->params->get( 'spu_aligntext', 'center' );
$spu_boxwidth = $this->params->get( 'spu_boxwidth', '400' );
$spu_boxheight = $this->params->get( 'spu_boxheight', 'auto' );
$spu_autodimensions = $this->params->get( 'spu_autodimensions', 'false' );
$spu_cookie = $this->params->get( 'spu_cookie', '0' );
$spu_cookiepersistence = $this->params->get( 'spu_cookiepersistence', '365' );
$spu_jquery = $this->params->get( 'spu_jquery', '0' );
$spu_jqueryinclude = $this->params->get( 'spu_jqueryinclude', '0' );
$spu_jquerync = $this->params->get( 'spu_jquerync', '0' );

$spu_popupname = str_replace(' ', '', $this->popupname);

// Make sure "auto" becomes 'auto' for jScript function!
if (!is_numeric($spu_boxwidth)) $spu_boxwidth = "'".$spu_boxwidth."'";
if (!is_numeric($spu_boxheight)) $spu_boxheight = "'".$spu_boxheight."'";
	
if ($spu_jquery == 0) {
	if ($spu_jqueryinclude == 0)
		$document->addScript( 'plugins/content/simplepopup/jquery-1.4.3.min.js' );
	else
		echo '<script type="text/javascript" src="plugins/content/simplepopup/jquery-1.4.3.min.js"></script>';
}
if ($spu_jquery < 2) {
	if ($spu_jqueryinclude == 0) {
		$document->addScript( 'plugins/content/simplepopup/fancybox/jquery.mousewheel-3.0.4.pack.js' );
		$document->addScript( 'plugins/content/simplepopup/fancybox/jquery.fancybox-1.3.4.js' );
	} else {
		echo '<script type="text/javascript" src="plugins/content/simplepopup/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>';
		echo '<script type="text/javascript" src="plugins/content/simplepopup/fancybox/jquery.fancybox-1.3.4.js"></script>';
	}
}
if ($spu_jquerync == 1) {
	if ($spu_jqueryinclude == 0)
		$document->addScriptDeclaration("jQuery.noConflict();");
	else
		echo '<script type="text/javascript" language="javascript">jQuery.noConflict();</script>';
}

?>
<!-- SPU HTML GOES BELOW -->

<script language="javascript" type="text/javascript">
<!--
var $jqspu = jQuery.noConflict();
var addText = '';

<?php if ($spu_cookie === '1')  { ?>
function spu_createCookie(name, value, days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	}
	else var expires = "";
	document.cookie = name+"="+value+expires+"; path=/";
}

function spu_readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) {
			if (c.substring(nameEQ.length,c.length).length == 0) return "noname";
			return c.substring(nameEQ.length,c.length);
		}
		if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
	}
	return null;
}

function spu_eraseCookie(name) {
	createCookie(name,"",-1);
}
<?php } ?>

-->
</script>

<?php if ($this->popup !== 'false') { ?> 
<script language="javascript" type="text/javascript">
<!--
$jqspu(document).ready(function() {
	var fshowMsg = true;
	
	<?php if ($spu_cookie === '1')  { ?>
		var cookieName = '';
		<?php if (strlen($spu_popupname) > 0)  { ?>
			cookieName = '<?php echo $spu_popupname; ?>';
		<?php } ?> 
		
		var cookieRet = spu_readCookie('spu_cookie'+cookieName);
		if(!cookieRet) {
			// Cookie not found, set cookie expiration and show message
			var persistance = <?php echo $spu_cookiepersistence; ?>;
			
			spu_createCookie('spu_cookie'+cookieName, cookieName, persistance);
		} else {
			// Cookie exists, skip message
			fshowMsg = false;
		}
	<?php } ?>
	
	if (fshowMsg) {
		$jqspu.fancybox(
			''+addText,
			{
				<?php if ($spu_autodimensions === 'false') { ?>
				'autoDimensions'	: false,
				'width'         	: <?php echo $spu_boxwidth; ?>,
				'height'        	: <?php echo $spu_boxheight; ?>,
				<?php } else { ?>
				'autoDimensions'	: true,
				<?php } ?>
				'transitionIn'		: 'elastic',
				'transitionOut'		: 'elastic',
				'resizeOnWindowResize'	: <?php echo $this->resizeOnWindowResize ?>,
				'centerOnScroll'	: <?php echo $this->resizeOnWindowResize ?>

			}
		);
	}
	
	
	<?php if (strlen($spu_popupname) > 0)  { ?> 
	$jqspu("#<?php echo $spu_popupname; ?>").fancybox({
		'titlePosition'		: 'inside',
		'transitionIn'		: 'elastic',
		'transitionOut'		: 'elastic',
		'hideOnOverlayClick': false,
		'hideOnContentClick': false,
		'showCloseButton'	: true,
		<?php if ($spu_autodimensions === 'false') { ?>
		'autoDimensions'	: false,
		'width'         	: <?php echo $spu_boxwidth; ?>,
		'height'        	: <?php echo $spu_boxheight; ?>,
		<?php } else { ?>
		'autoDimensions'	: true,
		<?php } ?>
		'titleShow'			: true,
		'titlePosition'		: 'inside',
		'resizeOnWindowResize'	: <?php echo $this->resizeOnWindowResize ?>,
		'centerOnScroll'	: <?php echo $this->resizeOnWindowResize ?>
		}
	);
	<?php } ?>
	
});

-->
</script>

<!-- FancyBox -->
<div id="spuSimplePoPup" style="display: none;">
	<div id="spu<?php echo $spu_popupname; ?>" class="spu_content" style="text-align: <?php echo $spu_aligntext; ?>;">
		<?php 
		if(strlen($this->popupurl) > 0) {
			$pagecontent = file_get_contents($this->popupurl, FILE_TEXT);
			$pagecontent = mb_convert_encoding($pagecontent, 'UTF-8', mb_detect_encoding($pagecontent, 'UTF-8, ISO-8859-1', true));

			if ($pagecontent === false) $pagecontent = 'URL ('.$this->popupurl.') failed to load. Please inform the site administrator!';
			$this->popupmsg = $pagecontent;
		}
		echo $this->popupmsg;
		?>
	</div>
	<?php if ($this->popupmulti === 'true') { ?>
	<div style="position: relative; width: 100%; text-align: right;">Next >></div>
	<?php } ?>
</div>

<script language="javascript" type="text/javascript">
<!--
addText = document.getElementById('spuSimplePoPup').innerHTML;
-->
</script>
<?php } ?>

<!-- END SFG HTML -->