<?php
/**
 * Package Addon Model
 */
// Disallow direct access to this file
defined ( '_JEXEC' ) or die ( 'Restricted access' );
gbimport ( "gobingoo.addonsmodel" );

class GModelPackagePackage extends GAddonsModel {
	var $features;
	var $_count;
	
	function getUserPackage($userid) {
		$table = JTable::getInstance ( 'userpackage' );
		return $table->getUserPackageInfo ( $userid );
	}
	
	function getList($published = false, $filter = array()) {
		$pubcond = "";
		$condition = array ();
		if ($published) {
			$condition [] = " published='1'";
		}
		if (isset ( $filter->user )&&isset ( $filter->allowmultiple )) {
//			if (! $filter->allowmultiple) {
				if (! $filter->user->guest) {
					
					$rows = array ();
					$params = null;
					$userpackage = $this->getMyPackage ( $filter->user );
					// não permite que pacotem não-expirados sejam adicionados como grátis
					if ($userpackage->isfree == 1 and $userpackage->expiring_date >= date('Y-m-d H:i:s')) {
						$condition [] = " isfree=0";						
					} 
					/*else
					// faz a validação se permite para não entrar se não tiver vencido
					if ($userpackage) {						
						$condition [] = " isfree=0";					
					}*/
				}
		//	}
		}
		if (count ( $condition ) > 0) {
			$pubcond = "where " . implode ( " AND ", $condition );
		}
		
		$orderby = ' ORDER BY ' . $filter->order . ' ' . $filter->order_dir . ', ordering';
		
		$db = JFactory::getDBO ();
		$query = "SELECT * from #__gbl_packages $pubcond $orderby";
		$db->setQuery ( $query, $filter->limitstart, $filter->limit );
		$result = $db->loadObjectList ();
		
		if (count ( $result ) > 0) {
			foreach ( $result as $r ) {
				$r->features = $features = $this->getFeatures ( $r->id );
			}
		}
		
		return $result;
	
	}
	
	function getListCount($published = false) {
		$pubcond = "";
		if ($published) {
			$pubcond = " where published='1'";
		}
		
		$db = JFactory::getDBO ();
		$query = "SELECT count(*) from #__gbl_packages $pubcond";
		$db->setQuery ( $query );
		return $db->loadResult ();
	}
	
	function getListForSelect($published = false) {
		$pubcond = "";
		if ($published) {
			$pubcond = " where published='1'";
		}
		
		$orderby = ' ORDER BY  ordering';
		
		$db = JFactory::getDBO ();
		$query = "SELECT id as value, title as text from #__gbl_packages $pubcond $orderby";
		$db->setQuery ( $query );
		return $db->loadAssocList ();
	
	}
	
	function publish($task, $cid) {
		if ($task == 'publish') {
			$publish = '1';
		} else {
			$publish = '0';
		}
		$table = & JTable::getInstance ( 'package' );
		
		return $table->publish ( $cid, $publish );
	
	}
	
	function load($id) {
		$table = JTable::getInstance ( "package" );
		$table->load ( $id );
		return $table;
	
	}
	
	function save($post = null, $file = null, $params = null) {
		global $option;
		
		if (! is_array ( $post )) {
			throw new DataException ( JText::_ ( "INVALID_DATA" ), 400 );
		}
		
		$row = JTable::getInstance ( "package" );
		if (! $row->bind ( $post )) {
			throw new DataException ( JText::_ ( "NO_BIND" ) . $row->getError (), 401 );
		}
		
		if (! $row->id) {
			$row->ordering = $row->getNextOrder ();
		}
		
		if (! $row->check ( $params )) {
			throw new DataException ( $row->getError (), 402 );
		}
		if (! $row->store ( $file, $params )) {
			throw new DataException ( JText::_ ( "NO_SAVE" ) . $row->getError (), 402 );
		}
		
		return $row->id;
	}
	
	function getFeatures($id = 0) {
		$db = JFactory::getDBO ();
		$query = "SELECT features FROM #__gbl_packages WHERE id=$id";
		$db->setQuery ( $query );
		$result = $db->loadObject ();
		if ($result) {
			$features = new JParameter ( $result->features );
		} else {
			$features = new JParameter ( null );
		}
		
		return $features;
	
	}
	
	function remove($cid = array()) {
		
		$db = JFactory::getDBO ();
		if (count ( $cid )) {
			$cids = implode ( ',', $cid );
			$query = "DELETE from #__gbl_packages where id in ($cids)";
			$db->setQuery ( $query );
			if (! $db->query ()) {
				throw new DataException ( JText::_ ( "NO_DELETE" ), 400 );
			}
			return true;
		}
	}
	
	function saveorder($cid, $order, $total) {
		$db = & JFactory::getDBO ();
		$row = & JTable::getInstance ( 'package' );
		$groupings = array ();
		
		// update ordering values
		for($i = 0; $i < $total; $i ++) {
			$row->load ( ( int ) $cid [$i] );
			// track categories
			

			if ($row->ordering != $order [$i]) {
				$row->ordering = $order [$i];
				if (! $row->storePackage ()) {
					throw new DataException ( JText::_ ( "NO_ORDER_SAVE" ), 500 );
				}
			}
		}
	
	}
	
	function order($task, $id) {
		
		if ($task == 'orderup') {
			
			$dir = - 1;
		} else {
			$dir = 1;
		}
		$row = & JTable::getInstance ( 'package' );
		$row->load ( $id );
		
		return $row->move ( $dir, '' );
	
	}
	
	function makeFree($id, $free) {
		$db = JFactory::getDBO ();
		$query = "UPDATE #__gbl_packages SET isfree=$free WHERE id=$id";
		$db->setQuery ( $query );
		if (! $db->query ()) {
			throw new DataException ( JText::_ ( "NO_FREE" ), 500 );
		}
	}
	
	function isPayable($user, $row = null, $params = null) {
		global $option;
		
		gbimport ( "gobingoo.basket" );
		
		$basket = GBasket::getInstance ();
		
		if ($params->get ( 'posting_scheme', 0 ) == 2) {
			$item = new stdClass ();
			$item->title = JText::sprintf ( 'PAYMENT_FOR_PACKAGE', $row->title );
			
			$currency = explode ( ":", $params->get ( 'default_currency', '$:USD' ) );
			$item->currencysymbol = $currency [0];
			$item->currency = $currency [1];
			
			$item->price = $row->price;
			$item->quantity = 1;
			$item->description = JText::sprintf ( 'PAYMENT_FOR_PACKAGE', $row->title );
			$IPNUrl = "index.php?option=$option&task=addons.package.front.update";
			$item->ipr = $IPNUrl;
			$item->referenceid = $row->id;
			$basket->addToBasket ( $item );
		
		}
		
		$total = $basket->calculateTotal ();
		
		if ($total > 0) {
			
			return true;
		} else {
			return false;
		}
	
	}
	
	function haspackage($rows, $user, $params) {
		$userid = $user->get ( 'id' );
		$db = JFactory::getDBO ();
		$query = "SELECT up.* FROM #__gbl_user_packages as up
		INNER JOIN #__gbl_packages as p ON (p.id=up.package_id)
		WHERE up.user_id='$userid'";
		$db->setQuery ( $query );
		return $db->loadObject ();
	}
	
	function hasValidPackage($rows, $user, $params) {
		$userid = $user->get ( 'id' );
		if ($user->guest) {
			return false;
		} else {
			$conditions = array ();
			$condition = "";
			$conditions [] = "up.published=1";
			$conditions [] = "up.user_id=" . $user->get ( 'id' );
			$conditions [] = " (TO_DAYS(DATE_ADD(up.bought_date, INTERVAL up.valid_days DAY)) - TO_DAYS(CURDATE()) )	>0";
		
			// conta também os anuncios que já foram excluidos
			$conditions [] = " (((SELECT count(*) 
									FROM #__gbl_user_posts as upost 
								    INNER JOIN #__gbl_ads r
									ON upost.ad_id = r.id
									WHERE upost.user_id='$userid' 
									AND upost.reference_id=up.package_id) < up.number_of_ads) 
									OR up.number_of_ads=0 )";
			if (count ( $conditions ) > 0) {
				$condition = "WHERE " . implode ( " AND ", $conditions );
			}
			
			$db = JFactory::getDBO ();
			$query = "SELECT up.* FROM #__gbl_user_packages as up $condition";
			$db->setQuery ( $query );
			return $db->loadObject ();
		
		}
	}
	
	function saveUserPackage($data) {
		
		$configmodel = gbimport ( "listbingo.model.configuration" );
		$params = $configmodel->getParams ();
		
		$date = JFactory::getDate ();
		
		$db = JFactory::getDBO ();
		
		/*
		 * DELETE OLD USER PACKAGE IF EXISTS
		 */
		$query = "DELETE FROM #__gbl_user_packages WHERE user_id = '" . $data ['user_id'] . "'";
		$db->setQuery ( $query );
		$db->query ();
		
		/*
		 * DELETE ALL OLD USER POST TRACK
		 */
		$query = "DELETE FROM #__gbl_user_posts WHERE user_id = '" . $data ['user_id'] . "'";
		$db->setQuery ( $query );
		$db->query ();
		
		/*
		 * DELETE ALL OLD USER PACKAGE BADGE TRACK
		 */
		$query = "DELETE FROM #__gbl_userbadgestrack WHERE user_id = '" . $data ['user_id'] . "'";
		$db->setQuery ( $query );
		$db->query ();
		
		$package = self::load ( $data ['ref_id'] );
		$table = JTable::getInstance ( 'userpackage' );
		
		$table->user_id = $data ['user_id'];
		$table->package_id = $package->id;
		
		$currency = explode ( ":", $params->get ( 'default_currency', '$:USD' ) );
		$table->currency = $currency [1];
		$table->currency_symbol = $currency [0];
		
		$table->title = $package->title;
		$table->price = $package->price;
		$table->valid_days = $package->days;
		$table->number_of_images = $package->number_of_images;
		$table->number_of_ads = $package->number_of_ads;
		$table->isfree = $package->isfree;
		$table->params = $package->features;
		$table->published = 1;
		$table->bought_date = $date->toFormat ();
		
		$table->store ();
		
		return true;
		/*
		 ob_start();
		 echo $table->getError();
		 $content=ob_get_contents();
		 ob_end_clean();

		 file_put_contents(JPATH_ROOT.DS."tmp".DS."test".rand(1000,99999).".txt",$content);*/
	}
	
	function getMyPackage($user) {
		$table = JTable::getInstance ( 'userpackage' );
		return $table->getUserPackageInfo ( $user->get ( 'id' ) );
	}
	
	function updateUserAd($id, $showcontact) {
		
		$adtable = JTable::getInstance ( 'ad' );
		$adtable->show_contact = $showcontact;
		$adtable->id = $id;
		$adtable->store ();
	}
	
	function getUserPackages($published = false, $filter) {
		$cond = array ();
		if ($published) {
			$cond [] = "up.published=1";
		}

		$db = JFactory::getDBO ();

		$textcondition = ($filter->searchtxt == 'all') || empty ( $filter->searchtxt );
		
		if (! $textcondition) {
			
			$words = explode ( ' ', $filter->searchtxt );
			
			$wheres = array ();
			
			foreach ( $words as $word ) {
				$word = $db->Quote ( '%' . $db->getEscaped ( $word, true ) . '%', false );
				$wheres2 = array ();
				
				$wheres2 [] = 'u.email LIKE ' . $word;
				
				if (count ( $wheres2 ) > 0) {
					$wheres [] = implode ( ' OR ', $wheres2 );
				}
			}
			
			if (count ( $wheres ) > 0) {
				$cond [] = '(' . implode ( ') OR (', $wheres ) . ')';
			}
		}
		
		$condition = "";
		
		if (count ( $cond )) {
			$condition = " WHERE " . implode ( " AND ", $cond );
		}
		
		$db = JFactory::getDBO ();
		$query = "SELECT up.*, (DATE_ADD(up.bought_date, INTERVAL up.valid_days DAY)) as expired_date, u.username,u.email FROM #__gbl_user_packages as up " . "LEFT JOIN #__users as u ON (u.id=up.user_id) " . "$condition";
		$db->setQuery ( $query );
		$rows = $this->_getList ( $query, $filter->limitstart, $filter->limit );
		
		$this->_count = $this->_getListCount ( $query );
		
		return $rows;
	}
	
	function getCount() {
		return $this->_count;
	}
	
	function expire($params = null) {
		$cronmodel = gbimport ( "listbingo.model.cron" );
		
		$tracker = $cronmodel->getCronTracker ( 'package', 'expired' );
		if (is_null ( $tracker )) {
			return;
		}
		
		$packagemodel = gbaddons ( "package.model.user" );
		
		$count = $params->get ( 'cron_addon_items', 100 );
		
		$db = JFactory::getDBO ();
		$nulldate = $db->getNullDate ();
		$query = "SELECT  * from #__gbl_user_packages where DATE_ADD(bought_date,INTERVAL valid_days DAY) < now()  and bought_date!='$nulldate' and id>" . ( int ) $tracker->lastrunid . " order by id limit $count";
		$db->setQuery ( $query );
		$rows = $db->loadObjectList ();
		$lastrun = 0;
		
		if (count ( $rows ) > 0) {
			foreach ( $rows as $r ) {
				$package = $packagemodel->load ( $r->id );
				
				$package->published = 0;
				$package->store ();
				
				GApplication::triggerEvent ( 'onPackageExpired', array ($package, $params ) );
				$lastrun = $r->id;
			}
		}
		
		$cronmodel->updateTracker ( $lastrun, 'package', 'expired', $params );
	
	}
	
	function alertExpire($params = null) {
		
		$cronmodel = gbimport ( "listbingo.model.cron" );
		
		$tracker = $cronmodel->getCronTracker ( 'package', 'before_expiry' );
		$count = $params->get ( 'cron_addon_items', 100 );
		
		if (is_null ( $tracker )) {
			return;
		}
		$alertbefore = $params->get ( 'package_days_before_alert', 7 );
		
		$packagemodel = gbaddons ( "package.model.user" );
		$db = JFactory::getDBO ();
		$nulldate = $db->getNullDate ();
		$query = "SELECT  * from #__gbl_user_packages where DATE_ADD(bought_date,INTERVAL (valid_days-$alertbefore) DAY) < now()  and bought_date!='$nulldate' and published=1 and id>" . ( int ) $tracker->lastrunid . " order by id limit $count";
		
		$db->setQuery ( $query );
		$rows = $db->loadObjectList ();
		
		if (count ( $rows ) > 0) {
			foreach ( $rows as $r ) {
				
				$package = $packagemodel->load ( $r->id );
				
				GApplication::triggerEvent ( 'onPackageExpiryAlert', array ($package, $params ) );
				
				$lastrun = $r->id;
			}
			$cronmodel->updateTracker ( $lastrun, 'package', 'before_expiry', $params );
		}
	
	}

}
?>
