<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

class tableUpdate
{
	/* call this function if you want to execute this
	 * this function is used for updating process of table datas for acajoom to jnews
	*/
	function executeUpdate()
	{
		$nb = explode(',', tableUpdate::_getAcajoomActiveList());

		$size = sizeof($nb);

		for($i = 0; $i < $size; $i ++) {
			$index = $nb[$i];

			$akey='act_totallist'.$index;
			tableUpdate::_selectUpdate($akey);

			$akey='act_totalmailing'.$index;
			tableUpdate::_selectUpdate($akey);

			$akey='totalmailingsent'.$index;
			tableUpdate::_selectUpdate($akey);
		}//endfor

		$msg = '';

		$success = tableUpdate::_runInsert( 'lists' );
		$msg .= ( !$success || !empty($success) ) ? jnewsletter::printM('green' , _ACA_LIST_UPDATED ) .'<br>' : jnewsletter::printM('red' , _ACA_LIST_UPDATED_FAILED ) .'<br>';

		$success = tableUpdate::_runInsert( 'mailings' );
		$msg .= ( !$success || !empty($success) ) ? jnewsletter::printM('green' , _ACA_MAILING_UPDATED ) .'<br>' : jnewsletter::printM('red' , _ACA_MAILING_UPDATED_FAILED ) .'<br>';

		$success = tableUpdate::_runInsert( 'stats_details' );
		$msg .= ( !$success || !empty($success) ) ? jnewsletter::printM('green' , _ACA_DETAIL_UPDATED ) .'<br>' : jnewsletter::printM('red' , _ACA_DETAIL_UPDATED_FAILED ) .'<br>';

		$success = tableUpdate::_runInsert( 'stats_global' );
		$msg .= ( !$success || !empty($success) ) ? jnewsletter::printM('green' , _ACA_GLOBAL_UPDATED ) .'<br>' : jnewsletter::printM('red' , _ACA_GLOBAL_UPDATED_FAILED ) .'<br>';

		// for #__jnews_subscribers update
		// we separate this from the function because we might be loading millions of subscribers and it may break the server
		// its a new installation for jnews
		// so we just need to delete the datas from jnews... just copy the datas from the old acajoom_subscribers
		$query = "DELETE FROM `#__jnews_subscribers`";
		tableUpdate::_getTableQuery( $query, $loadAction='query' );

		// check acajoom columns
		$database =& JFactory::getDBO();
		$tableFieldA = $database->getTableFields( '#__acajoom_lists' );
		$check = ( isset( $tableFieldA['#__acajoom_lists']['column1'] ) ) ? true : false;

		// after deleting, insert datas from old acajoom_subscribers
		if( $check )
		{
			$query = " INSERT IGNORE `#__jnews_subscribers` ( `id`, `user_id`, `name`, `email`, `receive_html`, `confirmed`, `blacklist`, `timezone`, `language_iso`, `subscribe_date`, `params`, `column1`, `column2`, `column3`, `column4`, `column5` ) ";
			$query .= " SELECT  `id`, `user_id`, `name`, `email`, `receive_html`, `confirmed`, `blacklist`, `timezone`, `language_iso`, UNIX_TIMESTAMP(`subscribe_date`), `params`, `column1`, `column2`, `column3`, `column4`, `column5` ";
		}
		else
		{
			$query = " INSERT IGNORE `#__jnews_subscribers` ( `id`, `user_id`, `name`, `email`, `receive_html`, `confirmed`, `blacklist`, `timezone`, `language_iso`, `subscribe_date`, `params` ) ";
			$query .= " SELECT  `id`, `user_id`, `name`, `email`, `receive_html`, `confirmed`, `blacklist`, `timezone`, `language_iso`, UNIX_TIMESTAMP(`subscribe_date`), `params` ";
		} //endif
		$query .= " FROM `#__acajoom_subscribers` ";
		$success = tableUpdate::_getTableQuery( $query, $loadAction='query' );
		$msg .= ( !$success || !empty($success) ) ? jnewsletter::printM('green' ,  _ACA_SUBSCRIBER_UPDATED ) .'<br>' : jnewsletter::printM('red' , _ACA_SUBSCRIBER_UPDATED_FAILED ) .'<br>';


		// for #__jnews_queue
		// we separate this from the function because we might be loading millions of queues and it may break the server
		// insert datas from old acajoom_queue to jnews_queue
		$query = " INSERT IGNORE `#__jnews_queue` ( `qid`, `type`, `subscriber_id`, `mailing_id`, `priority`, `issue_nb`, `send_date`, `delay`, `acc_level`, `published`, `params` ) ";
		$query .= " SELECT `A`.`qid`, `B`.`list_type`, `A`.`subscriber_id`, `B`.`id`, `A`.`qid`, `A`.`issue_nb`, UNIX_TIMESTAMP(`B`.`send_date`), `B`.`delay`, `A`.`acc_level`, `A`.`published`, `A`.`params` ";
		$query .= " FROM `#__acajoom_queue` AS `A`, `#__acajoom_mailings` AS `B` ";
		$query .= " WHERE `A`.`list_id` = `B`.`list_id` ";
		$success = tableUpdate::_getTableQuery( $query, $loadAction='query' );
		$msg .= ( !$success || !empty($success) ) ? jnewsletter::printM('green' ,_ACA_QUEUE_UPDATED ) .'<br>' : jnewsletter::printM('red' , _ACA_QUEUE_UPDATED_FAILED ) .'<br>';

		// for #_jnews_listssubscribers
		// we separate this from the function because we might be loading millions of queues and it may break the server
		$query = " INSERT IGNORE `#__jnews_listssubscribers` ( `list_id`, `subscriber_id`, `subdate` ) ";
		$query .= " SELECT `A`.`list_id`, `A`.`subscriber_id`, UNIX_TIMESTAMP(`B`.`subscribe_date`) ";
		$query .= " FROM `#__acajoom_queue` AS `A`, `#__acajoom_subscribers` AS `B` ";
		$query .= " WHERE `A`.`subscriber_id` = `B`.`id` ";
		$success = tableUpdate::_getTableQuery( $query, $loadAction='query' );
		$msg .= ( !$success || !empty($success) ) ? jnewsletter::printM('green' , _ACA_LISTSUBSCRIBER_UPDATED ) .'<br>' : jnewsletter::printM('red' , _ACA_LISTSUBSCRIBER_UPDATED_FAILED ) .'<br>';

		// DROP ACAJOOM TABLES ???
//		tableUpdate::_dropTable( '#__acajoom_lists' );
//		tableUpdate::_dropTable( '#__acajoom_mailings' );
//		tableUpdate::_dropTable( '#__acajoom_stats_details' );
//		tableUpdate::_dropTable( '#__acajoom_stats_global' );
//		tableUpdate::_dropTable( '#__acajoom_subscribers' );
//		tableUpdate::_dropTable( '#__acajoom_queue' );

		return $msg;
	} //endfct


	/* function that will set the old datas from acajoom tables to jnews table
	 * @param string $name - to execute (table extension name)
	 * @param boolean $dropAcajoomTable 	- default to FALSE
	 					- set to TRUE if you want to drop the old acajoom tables after update
	*/
	function _runInsert( $name )
	{
		// get lists details from old acajoom tables
		$acajoomObjListsA = tableUpdate::_getTableData( '#__acajoom_'.$name );

		// if there empty mean no data retrieved or table dont exist
		// so no datas that needs to be set
		// return false
		if( empty($acajoomObjListsA) ) return false;

		// set the retrieve list details from old acajoom tables to jnews tables
		if( !empty($acajoomObjListsA) )
		{
			$columnNamesA = null;
			$columnValuesA = null;
			$implodedColValuesA = array();
			$callOnlyOnce = true;				// used in mailings
			$ctr = 1;					// used in queues [priority]
			$implodedListMailingValuesA = array();		// used in mailings for listmailings
			$implodedlistsSubscriberValuesA = array();	// used in queues for listssubscribers
			foreach( $acajoomObjListsA as $index=>$acajoomLists )
			{
				// get column names
				// should only be set once
				// we only need to get the column names
				if( !isset( $columnNamesA ) ) $columnNamesA = tableUpdate::_setDataArray( $acajoomLists, true );

				// get column values
				$columnValuesA = tableUpdate::_setDataArray( $acajoomLists, false );

	switch( $name )
	{
		case 'lists' :
				// change values and types for list
				// get key of the datas to be change
				// change list_type
				$key = array_search( '`list_type`', $columnNamesA );
				$listType = ( isset($columnValuesA[$key]) ) ? $columnValuesA[$key] : 0;
				$columnValuesA[$key] = ( !empty($listType) ) ? $listType : 1;

				//change createdate
				$key = array_search( '`createdate`', $columnNamesA );
				$createdate = ( isset($columnValuesA[$key]) ) ? $columnValuesA[$key] : 0;
				$columnValuesA[$key] = ( !empty($createdate) ) ? strtotime($createdate) : 0;

				// we need to reassign a value to layout for list
				$key = array_search( '`layout`', $columnNamesA );
				$columnValuesA[$key] = '';

				// addslashes in list description to query conflict
				$key = array_search( '`list_desc`', $columnNamesA );
				$columnValuesA[$key] = addslashes($columnValuesA[$key]);

				// addslashes in list unsubscribemessage to avoid query conflict
				$key = array_search( '`unsubscribemessage`', $columnNamesA );
				$columnValuesA[$key] = addslashes($columnValuesA[$key]);

				break;

		case 'mailings' :
				if( $callOnlyOnce ) $ListMailingNamesA = array();	// used in mailings, contains column names for jnews_listmailings
				$ListMailingValuesA = array();				// used in mailings, contains column values for jnews_listmailings

				// change values and types for mailings
				// get key of the datas to be change
				// change createdate
				$key = array_search( '`createdate`', $columnNamesA );
				$createdate = ( isset($columnValuesA[$key]) ) ? $columnValuesA[$key] : 0;
				$columnValuesA[$key] = ( !empty($createdate) ) ? strtotime($createdate) : 0;

				// change send_date
				$key = array_search( '`send_date`', $columnNamesA );
				$send_date = ( isset($columnValuesA[$key]) ) ? $columnValuesA[$key] : 0;
				$columnValuesA[$key] = ( !empty($send_date) ) ? strtotime($send_date) : 0;

				// addslashes for html content to avoid query conflict
				$key = array_search( '`htmlcontent`', $columnNamesA );
 				$columnValuesA[$key] = addslashes($columnValuesA[$key]);

 				// addslashes for html content to avoid query conflict
				$key = array_search( '`textonly`', $columnNamesA );
 				$columnValuesA[$key] = addslashes($columnValuesA[$key]);

				// create mailing_type
				//get mailingid
				$key = array_search( '`id`', $columnNamesA );
				$mailingId = $columnValuesA[$key];

				// get listid
				$key = array_search( '`list_id`', $columnNamesA );
				$listId = $columnValuesA[$key];

				// after retrieving listid check list type
				$query = "SELECT `list_type`,`follow_up`,`cat_id`,`delay_min`,`delay_max`,`notify_id`,`next_date`,`start_date` FROM `#__acajoom_lists` WHERE `id` =". $listId;
				$result = tableUpdate::_getTableQuery( $query, $loadAction='loadObject' );

				// alter list_type to mailing_type
				// also change its value
				if( $callOnlyOnce ) $key = array_search( '`list_type`', $columnNamesA );
				else $key = array_search( '`mailing_type`', $columnNamesA );

				$columnValuesA[$key] = ( isset($result->list_type) && !empty($result->list_type) ) ? $result->list_type : 1;

				// add columns from old acajoom_list to jnews_mailings
				// altered columns for the structure of mailings
				// should be in the same index or same order
				if( $callOnlyOnce )
				{
					$columnNamesA[$key] = '`mailing_type`';
					$columnNamesA[] = '`follow_up`';
					$columnNamesA[] = '`cat_id`';
					$columnNamesA[] = '`delay_min`';
					$columnNamesA[] = '`delay_max`';
					$columnNamesA[] = '`notify_id`';
					$columnNamesA[] = '`next_date`';
					$columnNamesA[] = '`start_date`';

					// add columns for table jnews_listmailings
					// same order as its values
					$ListMailingNamesA[] = '`list_id`';
					$ListMailingNamesA[] = '`mailing_id`';

					$callOnlyOnce = false;
				} //endif

				$columnValuesA[] = ( isset($result->follow_up) && !empty($result->follow_up) ) ? $result->follow_up : 0;
				$columnValuesA[] = ( isset($result->cat_id) && !empty($result->cat_id) ) ? $result->cat_id : '0:0';
				$columnValuesA[] = ( isset($result->delay_min) && !empty($result->delay_min) ) ? $result->delay_min : 0;
				$columnValuesA[] = ( isset($result->delay_max) && !empty($result->delay_max) ) ? $result->delay_max : 7;
				$columnValuesA[] = ( isset($result->notify_id) && !empty($result->notify_id) ) ? $result->notify_id : 0;
				$columnValuesA[] = ( isset($result->next_date) && !empty($result->next_date) ) ? $result->next_date : 0;
				$columnValuesA[] = ( isset($result->start_date) && !empty($result->start_date) ) ? strtotime($result->start_date) : 0;

				// add values for table jnews_listmailings
				// same order as its columns
				$ListMailingValuesA[] = '"'. $listId .'"';
				$ListMailingValuesA[] = '"'. $mailingId .'"';

				// implode values for multiple insert for jnews_mailings
				$ListMailingValue = implode( ',', $ListMailingValuesA );
				$implodedListMailingValuesA[] = '('. $ListMailingValue .')';

				break;

		case 'stats_details' :
				// change values and types for mailings
				// get key of the datas to be change
				// change sentdate
				$key = array_search( '`sentdate`', $columnNamesA );
				$sentdate = ( isset($columnValuesA[$key]) ) ? $columnValuesA[$key] : 0;
				$columnValuesA[$key] = ( !empty($sentdate) ) ? strtotime($sentdate) : 0;

				break;

		case 'stats_global' :
				// change values and types for mailings
				// get key of the datas to be change
				// change sentdate
				$key = array_search( '`sentdate`', $columnNamesA );
				$sentdate = ( isset($columnValuesA[$key]) ) ? $columnValuesA[$key] : 0;
				$columnValuesA[$key] = ( !empty($sentdate) ) ? strtotime($sentdate) : 0;

				break;

/*		case 'queue' :
				if( $callOnlyOnce ) $listsSubscriberNamesA = array();		// used in queue, contains column names for jnews_listssubscribers
				$listsSubscriberValuesA = array();				// used in mailings, contains column values for jnews_listssubscribers

				// change values and types for mailings
				// get key of the datas to be change
				// get subscriber id
				$key = array_search( '`subscriber_id`', $columnNamesA );
				$subscriberId = $columnValuesA[$key];

				// get list_id
				if( $callOnlyOnce ) $key = array_search( '`list_id`', $columnNamesA );
				else $key = array_search( '`priority`', $columnNamesA );
				$listId = $columnValuesA[$key];

				// after retrieving listid check list type
				$query = "SELECT `id`,`send_date` FROM `#__acajoom_mailings` WHERE `list_id` =". $listId;
				$result = tableUpdate::_getTableQuery( $query, $loadAction='loadObject' );

				// change mailingid
				$key = array_search( '`mailing_id`', $columnNamesA );
				$columnValuesA[$key] = ( isset($result->id) && !empty($result->id) ) ? $result->id : 0;

				// store send_date from mailings
				$key = array_search( '`send_date`', $columnNamesA );
				$send_date = ( isset($result->send_date) && !empty($result->send_date) ) ? strtotime($result->send_date) : 0;
				$columnValuesA[$key] = ( !empty($send_date) ) ? $send_date : 0;

				// set priority column
				// to save memory
				// alter list_id to priority
				if( $callOnlyOnce )
				{
					$key = array_search( '`list_id`', $columnNamesA );
					$columnNamesA[$key] = '`priority`';

					// add columns for table jnews_listssubscribers
					// same order as its values
					$listsSubscriberNamesA[] = '`list_id`';
					$listsSubscriberNamesA[] = '`subscriber_id`';
					$listsSubscriberNamesA[] = '`subdate`';

					$callOnlyOnce = false;
				}
				else $key = array_search( '`priority`', $columnNamesA );

				// value for priority
				$columnValuesA[$key] = $ctr;
				$ctr += 1;

				// get subscriber date
				$query = "SELECT `subscribe_date` FROM `#__acajoom_subscribers` WHERE `id` =". $subscriberId;
				$result = tableUpdate::_getTableQuery( $query, $loadAction='loadResult' );
				$subdate = ( !empty($result) ) ? strtotime($result) : 0;

				// add values for table jnews_listssubscribers
				// same order as its columns
				$listsSubscriberValuesA[] = '"'. $listId .'"';
				$listsSubscriberValuesA[] = '"'. $subscriberId .'"';
				$listsSubscriberValuesA[] = ( !empty($subdate) ) ? '"'. $subdate .'"' : "0";

				// implode values for multiple insert for jnews_listssubscribers
				$listsSubscriberValue = implode( ',', $listsSubscriberValuesA );
				$implodedlistsSubscriberValuesA[] = '('. $listsSubscriberValue .')';

				break;

		case 'subscribers' :
				// change values and types for mailings
				// get key of the datas to be change
				// change sentdate
				$key = array_search( '`subscribe_date`', $columnNamesA );
				$subscribe_date = ( isset($columnValuesA[$key]) ) ? strtotime($columnValuesA[$key]) : 0;
				$columnValuesA[$key] = ( !empty($subscribe_date) ) ? $subscribe_date : 0;

				// we need to get the ids from acajoom_subscribers
				// we dont need to specify ids for it... to avoid conflicts...
				// note that jnews_subscribers may have previous entries of subscribers

				// but its a new installation for jnews
				// so we just need to delete the datas from jnews... just copy the datas from the old acajoom_subscribers
				$query = "DELETE FROM `#__acajoom_subscribers`";
				tableUpdate::_getTableQuery( $query, $loadAction='query' );

				break;
*/
		default :	break;
	} //endswitch

				// we need to set quotes to values to avoid query errors
				$columnValuesA = tableUpdate::_setQuoteValues( $columnValuesA );

				// we need to implode the column values for insert query e.g (1,2,3)
				// and set it back to an array... so that we can do a multiple insert e.g (1,2,3),(4,5,6)
				$columnvalue = implode( ',', $columnValuesA );
				$implodedColValuesA[] = '('. $columnvalue .')';
			} //endforeach

			//insert data
			$result = tableUpdate::_setTableData( '#__jnews_'.$name , $columnNamesA, $implodedColValuesA );

			// additional to insert for crosstable of lists and mailings
			// only triggered by mailings and queue
			switch( $name )
			{
				case 'mailings' : tableUpdate::_setTableData( '#__jnews_listmailings' ,$ListMailingNamesA, $implodedListMailingValuesA );
						break;
//				case 'queue' : tableUpdate::_setTableData( '#__jnews_listssubscribers' ,$listsSubscriberNamesA, $implodedlistsSubscriberValuesA );
//						break;
				default : break;
			} //endswitch

		} //endif

		return $result;
	} //endfct



	/* function that will retrieve all the data's (column) of the specified table (parameter)
	 * @param string $tableName - name of the table  e.g #__jnews_lists
	 * @return object array $resultObjList
	*/
	function _getTableData( $tableName )
	{
		// check parameter
		// return empty if parameter is empty
		if( empty($tableName) ) return '';

		// set database
		static $database=null;
		if( !isset( $database ) ) $database =& JFactory::getDBO();

		// for error messages
		$erro = new xerr( __FILE__ , __FUNCTION__ );

		// load data's from the table specified
		$query = "SELECT * FROM `". $tableName  ."`";

		$database->setQuery( $query );
		$resultObjList = $database->loadObjectList();

		// get and show error message
		$erro->err = $database->getErrorMsg();
		$erro->show();

		// return object list (object array)
		return $resultObjList;
	} //endfct


	/* function that will get and set the column names/values or data names/values from the passed object list e.g `id`/'1'
	 * should be an object array, array index as its column name and array value as its column value
	 * will be used for updating queries
	 * @param object array $dataList	- the datas to be set
	 * @param boolean $retrievedColName 	- set to true if you want to retrieved the column name from the object list
	 					- set to false if you want to retrieved the column values from the object list
	 * @return array $resultA
	*/
	function _setDataArray( $dataList, $retrievedColName=true )
	{
		// check parameter
		// return empty if parameter is empty or not array
		if( empty($dataList) ) return '';

		// set names/values to the array passed
		$arrayVar = array();
		foreach( $dataList as $columnName=>$values )
		{
			$arrayVar[] = ( $retrievedColName ) ? '`'. $columnName .'`' : $values;
		} //endforeach

		// return array
		return $arrayVar;
	} //endfct


	/* function that will put quotes to values
	 * to avoid error in query if value is empty or a string
	 * @param array $columnValuesA - array of column values to be passed
	 * @return array $columnValuesA - the passed array but the values are now with quotes
	*/
	function _setQuoteValues( $columnValuesA )
	{
		// check parameters
		if( empty($columnValuesA) ) return '';

		// set quotes to values
		foreach( $columnValuesA as $index=>$columnValues )
		{
			$columnValuesA[$index] = '"'. $columnValues .'"';
		} //endif

		// return
		return $columnValuesA;
	} //endfct


	/* function that will insert column datas into the specified table
	 * be sure that the column names and column values are in exact order or exact index
	 * @param string $tableName
	 * @param array $columnNamesA - contains column names to be inserted
	 * @param array $implodedColValuesA - contains imploded column values to be inserted
	*/
	function _setTableData( $tableName, $columnNamesA, $implodedColValuesA )
	{
		// check parameters
		// return empty if parameters are invalid
		if( empty($tableName) || empty($columnNamesA) || empty($implodedColValuesA) ) return '';

		// set database
		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();

		// implode arrays
		$columnName = implode( ',', $columnNamesA );
		$implodedColValue = implode( ',', $implodedColValuesA );

		// for error messages
		$erro = new xerr( __FILE__ , __FUNCTION__ );

		// insert query
		$query = 'INSERT IGNORE INTO `'. $tableName .'` ('. $columnName .') VALUES '. $implodedColValue;

		$database->setQuery( $query );
		$result = $database->query();

		// get and show error message
		$erro->err = $database->getErrorMsg();
		$erro->show();

		$result = ( !empty($result) ) ? true : false;
		return $result;
	} //endfct


	/* function that will retrieve query and execute it
	 * @param string $query - query to be run or executed
	 * @param string $loadAction - e.g loadResult, loadResultArray, loadObject, loadObjectList
	 * @param mixed $result - returned data
	*/
	function _getTableQuery( $query, $loadAction='loadResult' )
	{
		// check parameters
		// return empty if invalid
		if( empty($query) ) return '';

		// set database
		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();

		// for error messages
		$erro = new xerr( __FILE__ , __FUNCTION__ );

		// set and load query
		$database->setQuery( $query );
		$result = $database->$loadAction();

		// get and show error message
		$erro->err = $database->getErrorMsg();
		$erro->show();

		return $result;
	} //endfct


	/* Function that will drop table
	 * @param string $tableName - table to be drop
	*/
	function _dropTable( $tableName )
	{
		// check parameters
		// return empty if invalid
		if( empty($tableName) ) return '';

		$query = "DROP TABLE `". $tableName ."`";
		tableUpdate::_getTableQuery( $query, $loadAction='query' );

		return true;
	} //endfct


	/* Function for transferring the acajoom license to jnews
	*/
	function acaTojnewsLicenseUpd()
	{
		// get acajoom license key
		$query = " SELECT `text` FROM `#__acajoom_xonfig` WHERE `akey` = 'license'";
		$license = tableUpdate::_getTableQuery( $query, $loadAction='loadResult' );

		if( !empty($license) )
		{
			// update license
			xonfig::insert('license', $license, 0, true);

			// validate
			auto::good();
		}
		else
		{
			// no need to update if there are no license to be updated
			return false;
		} //endif

		return true;
	} //endfct

	function _getAcajoomActiveList(){
		$database =& JFactory::getDBO();
		$query= 'SELECT `text` FROM `#__acajoom_xonfig` WHERE `akey`=\'activelist\'';
		$query= stripslashes($query);
		$database->setQuery($query);
		$database->query();

		$activelists = $database->loadResult();

		return $activelists;
	}//endfct;

	function _selectUpdate($akey){

		$database =& JFactory::getDBO();

		$query = 'SELECT `value` FROM `#__acajoom_xonfig` WHERE `akey`=\''.$akey.'\'';
		$query =stripslashes($query);
		$database->setQuery($query);
		$database->query();

		$act=$database->loadResult();

		$GLOBALS[ACA.$akey]=$act;

		$query = 'UPDATE `#__jnews_xonfig` set `value`='. $act .' WHERE `akey`=\''.$akey.'\'';
		$database->setQuery($query);
		$database->query();

	}//endfic

} //endclass

