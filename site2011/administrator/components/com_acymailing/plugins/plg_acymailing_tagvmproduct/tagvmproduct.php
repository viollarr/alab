<?php
/**
 * @copyright	Copyright (C) 2009-2010 ACYBA SARL - All rights reserved.
 * @license		http://www.acyba.com/commercial_license.php
 */
defined('_JEXEC') or die('Restricted access');
?>
<?php
class plgAcymailingTagvmproduct extends JPlugin
{
	function plgAcymailingTagvmproduct(&$subject, $config){
		parent::__construct($subject, $config);
		if(!isset($this->params)){
			$plugin =& JPluginHelper::getPlugin('acymailing', 'tagvmproduct');
			$this->params = new JParameter( $plugin->params );
		}
	}
	 function acymailing_getPluginType() {
	 	$onePlugin = null;
	 	$onePlugin->name = JText::_('VM_PRODUCT');
	 	$onePlugin->function = 'acymailingtagvmproduct_show';
	 	$onePlugin->help = 'plugin-tagvmproduct';
	 	return $onePlugin;
	 }
	 function acymailingtagvmproduct_show(){
		$app =& JFactory::getApplication();
		$pageInfo = null;
		$paramBase = ACYMAILING_COMPONENT.'.tagvmproduct';
		$pageInfo->filter->order->value = $app->getUserStateFromRequest( $paramBase.".filter_order", 'filter_order',	'a.product_id','cmd' );
		$pageInfo->filter->order->dir	= $app->getUserStateFromRequest( $paramBase.".filter_order_Dir", 'filter_order_Dir',	'desc',	'word' );
		$pageInfo->search = $app->getUserStateFromRequest( $paramBase.".search", 'search', '', 'string' );
		$pageInfo->search = JString::strtolower( $pageInfo->search );
		$pageInfo->limit->value = $app->getUserStateFromRequest( $paramBase.'.list_limit', 'limit', $app->getCfg('list_limit'), 'int' );
		$pageInfo->limit->start = $app->getUserStateFromRequest( $paramBase.'.limitstart', 'limitstart', 0, 'int' );
		$database =& JFactory::getDBO();
		if(!empty($pageInfo->search)){
			$searchVal = '\'%'.$database->getEscaped($pageInfo->search).'%\'';
			$filters[] = "a.product_id LIKE $searchVal OR a.product_s_desc LIKE $searchVal OR a.product_name LIKE $searchVal OR a.product_sku LIKE $searchVal";
		}
		$whereQuery = '';
		if(!empty($filters)){
			$whereQuery = ' WHERE ('.implode(') AND (',$filters).')';
		}
		$query = 'SELECT SQL_CALC_FOUND_ROWS a.product_id,a.product_s_desc,a.product_sku,a.product_name FROM '.acymailing::table('vm_product',false).' as a';
		if(!empty($whereQuery)) $query.= $whereQuery;
		if(!empty($pageInfo->filter->order->value)){
			$query .= ' ORDER BY '.$pageInfo->filter->order->value.' '.$pageInfo->filter->order->dir;
		}
		$database->setQuery($query,$pageInfo->limit->start,$pageInfo->limit->value);
		$rows = $database->loadObjectList();
		if(!empty($pageInfo->search)){
			$rows = acymailing::search($pageInfo->search,$rows);
		}
		$database->setQuery('SELECT FOUND_ROWS()');
		$pageInfo->elements->total = $database->loadResult();
		$pageInfo->elements->page = count($rows);
		jimport('joomla.html.pagination');
		$pagination = new JPagination( $pageInfo->elements->total, $pageInfo->limit->start, $pageInfo->limit->value );
	?>
			<script language="javascript" type="text/javascript">
		<!--
			function updateTag(productid){
				tag = '{vmproduct:'+productid;
				if(window.document.getElementById('jflang')  && window.document.getElementById('jflang').value != ''){
					tag += '|lang:';
					tag += window.document.getElementById('jflang').value;
				}
				tag += '}';
				setTag(tag);
				insertTag();
			}
		//-->
		</script>
		<table>
			<tr>
				<td width="100%">
					<?php echo JText::_( 'JOOMEXT_FILTER' ); ?>:
					<input type="text" name="search" id="acymailingsearch" value="<?php echo $pageInfo->search;?>" class="text_area" onchange="document.adminForm.submit();" />
					<button onclick="this.form.submit();"><?php echo JText::_( 'JOOMEXT_GO' ); ?></button>
					<button onclick="document.getElementById('acymailingsearch').value='';this.form.submit();"><?php echo JText::_( 'JOOMEXT_RESET' ); ?></button>
				</td>
				<td nowrap="nowrap">
					<?php $jflanguages = acymailing::get('type.jflanguages');
						echo $jflanguages->display('lang'); ?>
				</td>
			</tr>
		</table>
		<table class="adminlist" cellpadding="1" width="100%">
			<thead>
				<tr>
					<th class="title">
						<?php echo JHTML::_('grid.sort', JText::_( 'NAME'), 'a.product_name', $pageInfo->filter->order->dir,$pageInfo->filter->order->value ); ?>
					</th>
					<th class="title">
						<?php echo JHTML::_('grid.sort', JText::_( 'DESCRIPTION'), 'a.product_s_desc', $pageInfo->filter->order->dir,$pageInfo->filter->order->value ); ?>
					</th>
					<th class="title titleid">
						<?php echo JHTML::_('grid.sort',   JText::_( 'ID' ), 'a.product_id', $pageInfo->filter->order->dir, $pageInfo->filter->order->value ); ?>
					</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="3">
						<?php echo $pagination->getListFooter(); ?>
						<?php echo $pagination->getResultsCounter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
					$k = 0;
					for($i = 0,$a = count($rows);$i<$a;$i++){
						$row =& $rows[$i];
				?>
					<tr id="content<?php echo $row->product_id?>" class="<?php echo "row$k"; ?>" onclick="updateTag(<?php echo $row->product_id; ?>);" style="cursor:pointer;">
						<td>
						<?php
							echo acymailing::tooltip('SKU : '.$row->product_sku,$row->product_name,'',$row->product_name);
						?>
						</td>
						<td>
						<?php
							echo $row->product_s_desc;
						?>
						</td>
						<td align="center">
							<?php echo $row->product_id; ?>
						</td>
					</tr>
				<?php
						$k = 1-$k;
					}
				?>
			</tbody>
		</table>
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $pageInfo->filter->order->value; ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $pageInfo->filter->order->dir; ?>" />
	<?php
	 }
	 function acymailing_replacetags(&$email){
		$match = '#{vmproduct:([0-9]*)(\|lang:(.*))?}#Ui';
		$variables = array('body','altbody');
		$found = false;
		foreach($variables as $var){
			if(empty($email->$var)) continue;
			$found = preg_match_all($match,$email->$var,$results[$var]) || $found;
			if(empty($results[$var][0])) unset($results[$var]);
		}
		if(!$found) return;
		$tags = array();
		foreach($results as $var => $allresults){
			foreach($allresults[0] as $i => $oneTag){
				if(isset($tags[$oneTag])) continue;
				$tags[$oneTag] = $this->_replaceProduct($allresults,$i);
			}
		}
		$email->body = str_replace(array_keys($tags),$tags,$email->body);
		$email->altbody = str_replace(array_keys($tags),$tags,$email->altbody);
	 }
	 function _replaceProduct(&$allresults,$i){
	 	$productId = (int) $allresults[1][$i];
		$query = 'SELECT c.*, b.*, a.* FROM '.acymailing::table('vm_product',false).' as a ';
		$query .= 'LEFT JOIN '.acymailing::table('vm_product_price',false).' as b on a.product_id = b.product_id ';
		$query .= 'LEFT JOIN '.acymailing::table('vm_tax_rate',false).' as c on a.product_tax_id = c.tax_rate_id ';
		$query .= 'WHERE a.product_id = '.$productId.' LIMIT 1';
		$db =& JFactory::getDBO();
		$db->setQuery($query);
		$product = $db->loadObject();
		if(empty($product)){
			$app =& JFactory::getApplication();
			if($app->isAdmin()){
				$app->enqueueMessage('The product "'.$productId.'" could not be loaded','notice');
			}
			return '';
		}
		if(!empty($allresults[3][$i])){
			$langid = (int) substr($allresults[3][$i],strpos($allresults[3][$i],',')+1);
			if(!empty($langid)){
				$query = "SELECT reference_field, value FROM `#__jf_content` WHERE `published` = 1 AND `reference_table` = 'vm_product' AND `language_id` = $langid AND `reference_id` = ".$productId;
				$db->setQuery($query);
				$translations = $db->loadObjectList();
				if(!empty($translations)){
					foreach($translations as $oneTranslation){
						if(!empty($oneTranslation->value)){
							$translatedfield =  $oneTranslation->reference_field;
							$product->$translatedfield = $oneTranslation->value;
						}
					}
				}
			}
		}
		if($product->product_currency == 'EUR') $product->product_currency = '€';
		elseif($product->product_currency == 'USD') $product->product_currency = '$';
		if($this->params->get('vat',1) AND !empty($product->tax_rate)) $product->product_price = $product->product_price * (1 + $product->tax_rate);
		$description = ($this->params->get('description','short') == 'short') ?  $product->product_s_desc : $product->product_desc;
		$link = ACYMAILING_LIVE.'index.php?option=com_virtuemart&page=shop.product_details&product_id='.$product->product_id;
		if(file_exists(ACYMAILING_TEMPLATE.'plugins'.DS.'tagvmproduct.php')){
			ob_start();
			require(ACYMAILING_TEMPLATE.'plugins'.DS.'tagvmproduct.php');
			return ob_get_clean();
		}
		$result = '<div class="acymailing_content"><a style="text-decoration:none;" name="product-'.$product->product_id.'" target="_blank" href="'.$link.'"><h2 class="acymailing_title">'.$product->product_name.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$product->product_currency.round($product->product_price,2).'</h2></a>';
		if(!empty($product->product_thumb_image)){
			$result .= '<table><tr><td valign="top" style="padding-right:5px"><a style="text-decoration:none;border:0" href="'.$link.'" ><img src="'.ACYMAILING_LIVE.'components/com_virtuemart/shop_image/product/'.$product->product_thumb_image.'"/></a></td><td>'.$description.'</td></tr></table>';
		}else{
			$result .= $description;
		}
		$result .= '</div>';
		return $result;
	}
}//endclass