<?php
/**
* Ajax Soft Fade-In Popup by mediahof
* Author: Dominik Gorczyca
* CoAuthor: John Zatkos
* xhtml 1.0 strict
* http://www.mediahof.de/
**/

defined('_JEXEC') or die('Restricted access');

$cookieName = "AjaxPopup_".$params->get( 'contentid' );
$popupAppear = intval( $params->get( 'appear' ) ); 
if (!isset($_COOKIE[$cookieName]) || $_COOKIE[$cookieName] == "" )
{
	setcookie($cookieName, 0);
	$_COOKIE[$cookieName] = 0;
}

if ( isset($_COOKIE[$cookieName]) && ($_COOKIE[$cookieName] < $popupAppear || $popupAppear == 0) )
{ 
	$uAName = 'MSIE';
	$userAgentArray = explode(';', $_SERVER['HTTP_USER_AGENT']);
	substr(trim($userAgentArray[1]), 0, strlen($uAName)) == $uAName ? $IE = true : $IE = false;
	$appear = ( $_COOKIE[$cookieName] + 1 );
	setcookie($cookieName, $appear);

	$contentPopup	= intval( $params->get( 'contentid' ) );
	$positionLeft	= intval( $params->get( 'positionLeft' ) );
	$positionTop	= intval( $params->get( 'positionTop' ) );
	$widthPopup		= intval( $params->get( 'width' ) );
	$heightPopup	= intval( $params->get( 'height' ) );
	$fadeTime		= intval( $params->get( 'fadeTime' ) );
	$fadeStep		= intval( $params->get( 'fadeStep' ) );
	$titleHeight	= intval( $params->get( 'titleHeight' ) );
	$titleHide		= intval( $params->get( 'titleHide' ) );
	$titleColor		= $params->get( 'titleColor' );
	$titleBG		= $params->get( 'titleBG' );
	$titleText		= $params->get( 'titleText' );
	$classPopup		= $params->get( 'class' );

	if (!empty($contentPopup) && $contentPopup >= 1)
	{
		$db =& JFactory::getDBO();
		$db->setQuery('SELECT * FROM #__content WHERE `id` = '.$contentPopup.' AND `state` = 1');
		$popupContent = $db->loadObject();
		if (is_object($popupContent))
		{
			$popupContent->fulltext == '' ?	$ASFPcontent = $popupContent->introtext : $ASFPcontent = $popupContent->fulltext;
			!empty($classPopup) ? $class = ' class="popup_'.$classPopup.'" ' : $class = ' class="popup" ';

			$stylePopup	= 'position:absolute;'
						 .'display:none;'
						 .'z-index:999;'
						 .'width:'.$widthPopup.'px;'
						 .'height:'.$heightPopup.'px;'
						 .'top:'.($positionTop == 0 ? '1' : $positionTop.'px;')
						 .'left:'.($positionLeft == 0 ? '1' : $positionLeft.'px;');

			$styleTitle = 'width:100%;'
						 .'height:'.$titleHeight.'px;'
						 .'background:'.$titleBG.';'
						 .'text-align: center;';

			$styleLink	= 'cursor:pointer;'
						 .'display:block;'
						 .'position:absolute;'
						 .'text-decoration:none;'
						 .'top:0;'
						 .'left:0;'
						 .'height:'.$titleHeight.'px;'
						 .'width:'.$widthPopup.'px;'
						 .'color:'.$titleColor.';'
						 .'line-height:'.$titleHeight.'px;';

			$divStyle	= 'overflow:auto;'
						 .'height:'.($titleHide != '1' ? $heightPopup-$titleHeight : $heightPopup).'px;';
?>
<script type="text/javascript">
//<![CDATA[
xJStrans=false;
function t(e,p) { if(xJStrans) { transparency(e,p); }}
function imgBlend(imgObj,imgURL,step,time) {
	document.getElementById('popup').style.display="block";
 if(imgURL && !imgObj.blendTrans) {
  imgObj.blendStop=false;
  imgObj.blendTrans=100;
  imgObj.blendStep=(step)?step:4;
  imgObj.blendTime=(time)?time:30;
  imgObj.parentNode.style.background="url("+imgObj.src+") no-repeat center";
  t(imgObj,imgObj.blendTrans);
  imgObj.src=imgURL;
  setTimeout(function() { imgBlend(imgObj); },imgObj.blendTime);
 } else if(!imgURL) {
  imgObj.blendTrans=Math.max(0,imgObj.blendTrans-imgObj.blendStep);
  if(imgObj.blendTrans>0 && !imgObj.blendStop) {
   t(imgObj,imgObj.blendTrans);
   setTimeout(function() { imgBlend(imgObj); },imgObj.blendTime);
  } else { imgObj.blendTrans=0; t(imgObj,0);
   imgObj.parentNode.style.backgroundImage=""; }}}

function transparency(element,percentage) {
<?php
if ( $IE )
{
?>
 var arVersion = navigator.appVersion.split("<?php echo $uAName; ?>")
 var version = parseFloat(arVersion[1])
 if ((version >= 5.5) && (document.body.filters)) {
  for(var i=0; i<document.images.length; i++) {
   var img = document.images[i]
   var imgName = img.src.toUpperCase()
   if (imgName.substring(imgName.length-3, imgName.length) == "PNG") {
    var imgID = (img.id) ? "id='" + img.id + "' " : ""
    var imgClass = (img.className) ? "class='" + img.className + "' " : ""
    var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
    var imgStyle = "display:inline-block;" + img.style.cssText 
    if (img.align == "left") imgStyle = "float:left;" + imgStyle
    if (img.align == "right") imgStyle = "float:right;" + imgStyle
    if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
    var strNewHTML = "<span " + imgID + imgClass + imgTitle
    + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
    + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
    + "(src=\'" + img.src + "\', sizingMethod='scale');\"></span>" 
    img.outerHTML = strNewHTML; i = i-1 }}}
<?php
}
?>
 var i, count, objStyle, filterValue, opacityValue;
 if(document.getElementById) {
  if(typeof(element)=="object" && element) { obj=element; }
  else if (document.getElementsByName(element) && document.getElementsByName(element)[0]) { obj=document.getElementsByName(element); }
  else if (document.getElementById(element)) { obj=document.getElementById(element); }
  else if (document.getElementsByTagName && document.getElementsByTagName(element) && document.getElementsByTagName(element)[0]) { obj=document.getElementsByTagName(element); }
  else { obj=false; }
  if(obj) { percentage=(typeof(percentage)=="undefined")?50:100-percentage;
   filterValue="Alpha(opacity="+percentage+")";
   opacityValue=""+percentage/100;
   count=(obj.length)?obj.length:1;
   for(i=0;i<count;i++) {
    objStyle=(obj.length)?obj[i].style:obj.style;
    objStyle.filter=filterValue;
    objStyle.MozOpacity=opacityValue;
    objStyle.KhtmlOpacity=opacityValue;
    objStyle.opacity=opacityValue; }}}}
xJStrans=true;
function weg(divek) {divek.style.display="none";}
//]]>
</script>
<div <?php echo $class;?>id="popup" style="<?php echo $stylePopup;?>">
<?php
if ( $titleHide != '1' )
{
?>
 <div class="popuptitle" style="<?php echo $styleTitle; ?>">
 <a id="popuplink" onclick="weg(document.getElementById('popup'))" style="<?php echo $styleLink; ?>" ><?php echo $titleText; ?></a>
 </div>
<?php
}
?><div style="<?php echo $divStyle; ?>"><?php
echo $ASFPcontent;
?></div>
<script type="text/javascript">
	imgBlend(document.getElementById('popup'),'default',<?php echo $fadeStep; ?>,<?php echo $fadeTime; ?>);
</script>
</div><?php
		}
	}
}
?>