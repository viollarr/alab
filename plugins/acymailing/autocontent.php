<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingAutocontent extends JPlugin
{
	function plgAcymailingAutocontent(&$subject, $config){
		parent::__construct($subject, $config);
		if(!isset($this->params)){
			$plugin =& JPluginHelper::getPlugin('acymailing', 'autocontent');
			$this->params = new JParameter( $plugin->params );
		}
    }
	 function acymailing_getPluginType() {
	 	$onePlugin = null;
	 	$onePlugin->name = JText::_('JOOMLA_CONTENT_AUTO');
	 	$onePlugin->function = 'acymailingautocontent_show';
	 	$onePlugin->help = 'plugin-autocontent';
	 	return $onePlugin;
	 }
	 function acymailingautocontent_show(){
		$db =& JFactory::getDBO();
		$query = 'SELECT a.id as catid, b.id as secid, a.title as category, b.title as section from '.acymailing::table('categories',false).' as a ';
		$query .= 'INNER JOIN '.acymailing::table('sections',false).' as b on a.section = b.id ORDER BY b.ordering,a.ordering';
		$db->setQuery($query);
		$rows = $db->loadObjectList();
		$type = JRequest::getString('type');
	?>
		<script language="javascript" type="text/javascript">
		<!--
			var selectedCategories = new Array();
			function applyAutoContent(secid,catid,rowClass){
				if(selectedCategories[secid] && selectedCategories[secid][catid]){
					window.document.getElementById('content_sec'+secid+'_cat'+catid).className = rowClass;
					delete selectedCategories[secid][catid];
				}else{
					if(!selectedCategories[secid]) selectedCategories[secid] = new Array();
					if(secid == 0){
						for(var isec in selectedCategories){
							for(var icat in selectedCategories[isec]){
								if(selectedCategories[isec][icat] == 'content'){
									window.document.getElementById('content_sec'+isec+'_cat'+icat).className = 'row0';
									delete selectedCategories[isec][icat];
								}
							}
						}
					}else{
						if(selectedCategories[0] && selectedCategories[0][0]){
							window.document.getElementById('content_sec0_cat0').className = 'row0';
							delete selectedCategories[0][0];
						}
						if(catid == 0){
							for(var icat in selectedCategories[secid]){
								if(selectedCategories[secid][icat] == 'content'){
									window.document.getElementById('content_sec'+secid+'_cat'+icat).className = 'row0';
									delete selectedCategories[secid][icat];
								}
							}
						}else{
							if(selectedCategories[secid][0]){
								window.document.getElementById('content_sec'+secid+'_cat0').className = 'row0';
								delete selectedCategories[secid][0];
							}
						}
					}
					window.document.getElementById('content_sec'+secid+'_cat'+catid).className = 'selectedrow';
					selectedCategories[secid][catid] = 'content';
				}
				updateTag();
			}
			function updateTag(){
				tag = '{autocontent:';
				for(var isec in selectedCategories){
					for(var icat in selectedCategories[isec]){
						if(selectedCategories[isec][icat] == 'content'){
							if(icat != 0){
								tag += 'cat'+icat+'-';
							}else{
								tag += 'sec'+isec+'-';
							}
						}
					}
				}
				if(document.adminForm.min_article && document.adminForm.min_article.value && document.adminForm.min_article.value!=0){ tag += '|min:'+document.adminForm.min_article.value; }
				if(document.adminForm.max_article.value && document.adminForm.max_article.value!=0){ tag += '|max:'+document.adminForm.max_article.value; }
				if(document.adminForm.contentorder.value){ tag += document.adminForm.contentorder.value; }
				if(document.adminForm.contentfilter && document.adminForm.contentfilter.value){ tag += document.adminForm.contentfilter.value; }
				for(var i=0; i < document.adminForm.contenttype.length; i++){
				   if (document.adminForm.contenttype[i].checked){ tag += document.adminForm.contenttype[i].value; }
				}
				for(var i=0; i < document.adminForm.titlelink.length; i++){
				   if (document.adminForm.titlelink[i].checked){ tag += document.adminForm.titlelink[i].value; }
				}
				for(var i=0; i < document.adminForm.author.length; i++){
				   if (document.adminForm.author[i].checked){ tag += document.adminForm.author[i].value; }
				}
				if(window.document.getElementById('jflang')  && window.document.getElementById('jflang').value != ''){
					tag += '|lang:';
					tag += window.document.getElementById('jflang').value;
				}
				tag += '}';
				setTag(tag);
			}
		//-->
		</script>
		<table width="100%" class="adminform">
			<tr>
				<td>
					<?php echo JText::_('DISPLAY');?>
				</td>
				<td colspan="2">
				<?php $contentType = acymailing::get('type.content'); echo $contentType->display('contenttype','|type:intro');?>
				</td>
				<td>
					<?php $jflanguages = acymailing::get('type.jflanguages');
						$jflanguages->onclick = 'onchange="updateTag();"';
						echo $jflanguages->display('lang'); ?>
				</td>
			</tr>
			<tr>
				<td>
				<?php echo JText::_('CLICKABLE_TITLE'); ?>
				 </td>
				 <td>
				 	<?php $titlelinkType = acymailing::get('type.titlelink'); echo $titlelinkType->display('titlelink','|link');?>
				</td>
				<td>
				<?php echo JText::_('AUTHOR_NAME'); ?>
				 </td>
				 <td>
				 	<?php $authorname = acymailing::get('type.authorname'); echo $authorname->display('author','');?>
				</td>
			</tr>
			<tr>
				<td>
				<?php echo JText::_('MAX_ARTICLE'); ?>
				 </td>
				 <td>
				 	<input name="max_article" size="10" value="" onchange="updateTag();"/>
				</td>
				<td>
				<?php echo JText::_('ORDER BY'); ?>
				 </td>
				 <td>
				 	<?php $ordertype = acymailing::get('type.contentorder'); echo $ordertype->display('contentorder','|order:id'); ?>
				</td>
			</tr>
			<?php if($type == 'autonews') { ?>
			<tr>
				<td>
				<?php 	echo JText::_('MIN_ARTICLE'); ?>
				 </td>
				 <td>
				 <input name="min_article" size="10" value="1" onchange="updateTag();"/>
				</td>
				<td>
				<?php echo JText::_('FILTER'); ?>
				 </td>
				 <td>
				 	<?php $filter = acymailing::get('type.contentfilter'); echo $filter->display('contentfilter','|filter:created'); ?>
				</td>
			</tr>
			<?php } ?>
		</table>
		<table class="adminlist" cellpadding="1" width="100%">
			<thead>
				<tr>
					<th class="title">
						<?php echo JText::_( 'SECTION'); ?>
					</th>
					<th class="title">
						<?php echo JText::_( 'CATEGORY'); ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$k = 0;
				?>
					<tr id="content_sec0_cat0" class="<?php echo "row$k"; ?>" onclick="applyAutoContent(0,0,'<?php echo "row$k" ?>');" style="cursor:pointer;">
						<td style="font-weight: bold;">
						<?php
							echo JText::_('ALL');
						?>
						</td>
						<td style="text-align:center;font-weight: bold;">
						<?php
							echo JText::_('ALL');
						?>
						</td>
					</tr>
					<?php
					$k = 1-$k;
					$currentSection = '';
					for($i = 0,$a = count($rows);$i<$a;$i++){
					$row =& $rows[$i];
					if($currentSection != $row->section){
						?>
						<tr id="content_sec<?php echo $row->secid ?>_cat0" class="<?php echo "row$k"; ?>" onclick="applyAutoContent(<?php echo $row->secid ?>,0,'<?php echo "row$k" ?>');" style="cursor:pointer;">
							<td style="font-weight: bold;">
							<?php
								echo $row->section;
							?>
							</td>
							<td style="text-align:center;font-weight: bold;">
							<?php
								echo JText::_('ALL');
							?>
							</td>
						</tr>
						<?php
						$k = 1-$k;
						$currentSection = $row->section;
					}
				?>
					<tr id="content_sec<?php echo $row->secid ?>_cat<?php echo $row->catid?>" class="<?php echo "row$k"; ?>" onclick="applyAutoContent(<?php echo $row->secid ?>,<?php echo $row->catid ?>,'<?php echo "row$k" ?>');" style="cursor:pointer;">
						<td>
						</td>
						<td>
						<?php
							echo $row->category;
						?>
						</td>
					</tr>
				<?php
						$k = 1-$k;
					}
				?>
			</tbody>
		</table>
	<?php
	 }
	function acymailing_generateautonews(&$email){
		$return = null;
		$return->status = true;
		$return->message = '';
		$time = time();
		$match = '#{autocontent:(.*)}#Ui';
		$variables = array('body','altbody');
		$found = false;
		foreach($variables as $var){
			if(empty($email->$var)) continue;
			$found = preg_match_all($match,$email->$var,$results[$var]) || $found;
			if(empty($results[$var][0])) unset($results[$var]);
		}
		if(!$found) return $return;
		$this->tags = array();
		$db =& JFactory::getDBO();
		foreach($results as $var => $allresults){
			foreach($allresults[0] as $i => $oneTag){
				if(isset($this->tags[$oneTag])) continue;
				$arguments = explode('|',$allresults[1][$i]);
				$allcats = explode('-',$arguments[0]);
				$parameter = null;
				for($i=1;$i<count($arguments);$i++){
					$args = explode(':',$arguments[$i]);
					$arg0 = $args[0];
					if(isset($args[1])){
						$parameter->$arg0 = $args[1];
					}else{
						$parameter->$arg0 = true;
					}
				}
				$selectedArea = array();
				foreach($allcats as $oneCat){
					$sectype = substr($oneCat,0,3);
					$num = substr($oneCat,3);
					if(empty($num)) continue;
					if($sectype=='cat'){
						$selectedArea[] = 'catid = '.(int) $num;
					}elseif($sectype=='sec'){
						$selectedArea[] = 'sectionid = '.(int) $num;
					}
				}
				$query = 'SELECT id FROM `#__content`';
				$where = array();
				if(!empty($selectedArea)){
					$where[] = implode(' OR ',$selectedArea);
				}
				if(!empty($parameter->filter) AND !empty($email->params['lastgenerateddate'])){
					$condition = '`publish_up` >\''.date( 'Y-m-d H:i:s',$email->params['lastgenerateddate'] - date('Z')).'\'';
					$condition .= ' OR `created` >\''.date( 'Y-m-d H:i:s',$email->params['lastgenerateddate'] - date('Z')).'\'';
					if($parameter->filter == 'modify'){
						$condition .= ' OR `modified` > \''.date( 'Y-m-d H:i:s',$email->params['lastgenerateddate'] - date('Z')).'\'';
					}
					$where[] = $condition;
				}
				$where[] = '`publish_up` < \'' .date( 'Y-m-d H:i:s',$time - date('Z')).'\'';
				$where[] = '`publish_down` > \''.date( 'Y-m-d H:i:s',$time - date('Z')).'\' OR `publish_down` = 0';
				$where[] = 'state = 1';
				if($this->params->get('contentaccess','registered') == 'registered') $where[] = 'access <= 1';
				elseif($this->params->get('contentaccess','registered') == 'public') $where[] = 'access = 0';
				$query .= ' WHERE ('.implode(') AND (',$where).')';
				if(!empty($parameter->order)) $query .= ' ORDER BY '.str_replace(',',' ',$parameter->order);
				if(!empty($parameter->max)) $query .= ' LIMIT '.(int) $parameter->max;
				elseif(empty($email->params['lastgenerateddate'])) $query .= ' LIMIT 20';
				$db->setQuery($query);
				$allArticles = $db->loadResultArray();
				if(!empty($parameter->min) AND count($allArticles)< $parameter->min){
					$return->status = false;
					$return->message = 'Not enough articles for the tag '.$oneTag.' : '.count($allArticles).' / '.$parameter->min.' between '.acymailing::getDate($email->params['lastgenerateddate']).' and '.acymailing::getDate($time);
				}
				$stringTag = '';
				if(!empty($allArticles)){
					if(file_exists(ACYMAILING_TEMPLATE.'plugins'.DS.'autocontent.php')){
						ob_start();
						require(ACYMAILING_TEMPLATE.'plugins'.DS.'autocontent.php');
						$stringTag = ob_get_clean();
					}else{
						$stringTag .= '<table>';
						foreach($allArticles as $oneArticleId){
							$stringTag .= '<tr><td>';
							$args = array();
							$args[] = 'joomlacontent:'.$oneArticleId;
							if(!empty($parameter->type)) $args[] = 'type:'.$parameter->type;
							if(!empty($parameter->link)) $args[] = 'link';
							if(!empty($parameter->author)) $args[] = 'author';
							if(!empty($parameter->lang)) $args[] = 'lang:'.$parameter->lang;
							$stringTag .= '{'.implode('|',$args).'}';
							$stringTag .= '</td></tr>';
						}
						$stringTag .= '</table>';
					}
				}
				$this->tags[$oneTag] = $stringTag;
			}
		}
		return $return;
	}
	 function acymailing_replacetags(&$email){
		$this->acymailing_generateautonews($email);
		if(!empty($this->tags)){
			$email->body = str_replace(array_keys($this->tags),$this->tags,$email->body);
			if(!empty($email->altbody)) $email->altbody = str_replace(array_keys($this->tags),$this->tags,$email->altbody);
		}
	 }
}//endclass