	<?php
	defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
	### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
	### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54

	class aca_tags {

		function replace(&$content, $tags) {

			foreach ($tags as $key => $value) {
				$tag = '['.strtoupper($key).']';
				$content = str_replace($tag, $value, $content);
			}//endforeach

			if ( $GLOBALS[ACA.'cb_integration'] =='1' ) aca_tags::CB( $content, $tags );

		}//endfct

		function CB(&$content, $tags=null ) {
			if ( ACA_CMSTYPE ) {
				$database =& JFactory::getDBO();
			}//endif

			$markers = null;
			$subscriber = null;

	    	if ( preg_match_all('/\[CBTAG:[a-zA-Z_]+\]/' , $content, $markers, PREG_PATTERN_ORDER) > 0 ) {

				if ( empty( $markers[0] ) ) return ;

				if ( isset($tags['user_id']) && $tags['user_id']>0 ) {

					foreach( $markers[0] as $tag ) {
						$fields[] =  substr( $tag, 7, strlen($tag)-8 );
					}//endif

					if ( empty( $fields )) return ;
					$query = 'SELECT `'. implode( '`,`', $fields) .'`' ;
					$query .= ' FROM `#__comprofiler` WHERE `user_id` = \'' . $tags['user_id'] . '\'';

			     	$database->setQuery($query);
						if ( ACA_CMSTYPE ) {	// joomla 15
							$subscriber = $database->loadObject();
						}//endif

					$erro->err = $database->getErrorMsg();
					static $dispError = false;
					if(!$dispError AND !empty($erro->err)){
						echo '<br/>One of your CB TAG is not defined properly : '.$erro->err;
						$dispError = true;
						$database->setQuery('SHOW COLUMNS FROM `#__comprofiler`');
						$columns = $database->loadObjectList();

						echo '<br/>You can ONLY use one of the following tag : <br/>';
						$columnsName = array();
						foreach($columns as $myColumn){
							$columnsName[] = '[CBTAG:'.$myColumn->Field.']';
						}//endforeach
						echo '<ul><li>'.implode('</li><li>',$columnsName).'</li></ul>';
					}//endif

					if (!empty($subscriber)) {
						foreach( $markers[0] as $tag ) {
							$field =  substr( $tag, 7, strlen($tag)-8 );
							if ( isset($subscriber->$field) )
							$content = str_replace( $tag, $subscriber->$field, $content);
							else
							$content = str_replace( $tag, '', $content);
						}//endforeach
					}//endif
				} else {
					foreach( $markers[0] as $tag ) {
						$content = str_replace( $tag, '', $content);
					}//endforeach
				}//endif

	    	}//endif


		}//endfct



	 }//enclass