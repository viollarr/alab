<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

class attachment{
	/* Function that will delete the attach file from jnewsletter attachments
	 * folder/file path : components/com_jnewsletter/upload
	 * @param string $filename - name of the file [ extension name should be include e.g filename.txt ]
	 * @param boolean $path - file path : default to /components/com_jnewsletter/upload
	 * Author : Gino <gino@ijoobi.com>
	*/
	function deleteAttachment( $filename, $path=null )
	{
		if( empty($filename) ){
			// if the inputted param is empty return an echo message
			echo "Please check the entered params for function deleteAttachment.";
			return true;
		} //endif

		// we need to close the file before deleting it
		$file = fopen( $filename, 'w') or die("can't open file");
		fclose($file);

		// delete file
		$filepath = ( !empty($path) ) ? $path .DS. $filename : JPATH_ROOT .DS. 'components' .DS. 'com_jnewsletter' .DS. 'upload' .DS. $filename;
		if( !empty($filename) ) @unlink( $filepath );

		return true;
	} //endfct


	/* Function that will remove the attachment text save into column attachments in the table #__jnews_mailings
	 * @param string $filename - name of the file to be removed
	 * @param int $mailingID - newsletter id
				  - default to 0 if the should be remove from all newsletters that been using the file
	 * Author : Gino <gino@ijoobi.com>
	*/
	function deleteAttachmentQuery( $filename, $mailingID=0 ){
		// set database
		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();

		// check mailing id
		$mailingIDsA = null;
		if( empty($mailingID) ){
			// load the mailing ids that used the file to be detached
			$query = 'SELECT `id` FROM `#__jnews_mailings` WHERE `attachments` LIKE "%'.$filename.'%"';
			$database->setQuery($query);
			$mailingIDsA = $database->loadResultArray();
			if( !empty($mailingIDsA) ){
				// if found then replace it with an empty string
				foreach( $mailingIDsA as $mailingID ){
					attachment::_setAttachments( $mailingID, $filename );
				} //endforeach
			} //endif
		}else{
			// if found then replace it with an empty string
			attachment::_setAttachments( $mailingID, $filename );
		} //endif

		return true;
	} //endfct


	/* function that will replace and remove the attachments of the given mail
	 * @param int $mailingID - newsletter id
	 * @param string $filename - name of the file to be changed/replaced
	 * Author: Gino <gino@ijoobi.com>
	*/
	function _setAttachments( $mailingID, $filename ){
		// set database
		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();

		// load the entire attachment found in the mailingID
		$query = 'SELECT `attachments` FROM `#__jnews_mailings` WHERE `id` = '. $mailingID;
		$database->setQuery($query);
		$result = $database->loadResult();

		// if found then replace it with an empty string
		if( !empty($result) ){
			// remove found result with /
			$newText = str_replace( '/'.$filename, '', $result);
			attachment::_updateAttachments( $mailingID, $newText );

			// remove found result without /
			$newText = str_replace($filename, '', $result);
			attachment::_updateAttachments( $mailingID, $newText );
		} //endif

		return true;
	} //endfct


	/* Function that will update the attachments of mailings
	 * @param int $mailingID - newsletter id
	 * @param string $newText - text to be set to update
	 * Author : Gino <gino@ijoobi.com>
	*/
	function _updateAttachments( $mailingID, $newText ){
		// set database
		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();
		$query = 'UPDATE `#__jnews_mailings` SET `attachments` = "'.$newText.'" WHERE `id` = '.$mailingID;
		$database->setQuery($query);
		$database->query();
		return true;
	} //endfct
} //endclass

