<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
class templates {

	function getTemplates($onlyPublish=true, $onlyDefault=false, $array=false, $templatesearch='', $start = -1, $limit = -1){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$query = 'SELECT * FROM `#__jnews_templates` ';

		if ($onlyPublish) {
				$where[] = ' `published` =1 ';
		} else {
				$where[] = ' `published`<>-1 ';
		}

		if ($onlyDefault) {
				$where[] = ' `premium` = 1 ';
		} else {
				$where[] = ' `premium`<>-1 ';
		}

		if (!empty($templatesearch)) {
				$where[] = ' (name LIKE \'%' . $templatesearch . '%\' OR namekey LIKE \'%' . $templatesearch . '%\') ';
		}
		$query .= (count( $where ) ? " WHERE " . implode( ' AND ', $where ) : "");

		if ($start != -1 && $limit != -1) {
			$query .= ' LIMIT ' . $start . ', ' . $limit;
		}

		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		if (!$erro->E(__LINE__ ,  '8300')) {
			return false;
		} else {
			if ($array) {
				$templates = $database->loadObjectlist();
			}else{
				$templates = $database->loadObject();
			}
		}
		return $templates;
	}//endfct


	/* Function that would save the template to its table jnews_templates
	 * @param string $task - task executed
	 * @param int $template_id - template id
	*/
	function saveTemplate($task , $template_id){
		$template = null;
		if ( ACA_CMSTYPE ){
			$database =& JFactory::getDBO();
		}//endif
		$template->template_id = $template_id;
		$template->name = JRequest::getVar('template_name', '', 'request','string');
		$template->description = JRequest::getVar('description', '', 'request','string');
		$template->altbody = JRequest::getVar('alt_body', '', _MOS_ALLOWRAW);
		$template->created = jnewsletter::getNow();
		$template->published = JRequest::getVar('confirmed', 0);
		$template->premium = JRequest::getVar('premium', 0);
		$template->namekey = JRequest::getVar('template_namekey', '', 'request','string');
		$template->thumbnail = ( isset( $_FILES['file_0']['name'] ) && !empty( $_FILES['file_0']['name'] ) ) ? $_FILES['file_0']['name'] : '';
		$template->body = JRequest::getVar('template_body', '', 'request', 'string');

		$styles = JRequest::getVar('styles',array(),'','array');

	    foreach($styles as $class => $oneStyle){
	      if(empty($oneStyle)) unset($styles[$class]);
	    }//endforeach
	    $newStyles = JRequest::getVar('otherstyles',array(),'','array');
	    if(!empty($newStyles)){
	    	foreach($newStyles['classname'] as $id => $className){
	    		if(!empty($className) AND $className != _ACA_TEMPLATE_STYLE_NEWC AND !empty($newStyles['style'][$id]) AND $newStyles['style'][$id] != _ACA_TEMPLATE_STYLE_NEWAPPLIED ){
	    			$styles[$className] = $newStyles['style'][$id];
	    		}//endif
	    	}//endforeach
	    }//endif

	  	$cssfile = isset($styles['cssfile']) ? templates::convertCSStoArray($styles['cssfile']) : '';
		$template->customCSS = JRequest::getVar('template_customcss', '', 'request', 'string');
		$customCSS = templates::convertCSStoArray($template->customCSS);
		$merge = templates::cssMerge($styles, $customCSS, $cssfile);
	    $template->styles = serialize($merge);

	    $template->body = JRequest::getVar('template_body','','','string',JREQUEST_ALLOWRAW);

	    if(!empty($styles['color_bg'])){
	    	$pattern1 = '#^([^<]*<[^>]*background-color:)([^;">]{1,10})#i';
	    	$found = false;
	    	if(preg_match($pattern1,$template->body)){
	    		$template->body = preg_replace($pattern1,'$1'.$styles['color_bg'],$template->body);
	    		$found = true;
	    	}//endif
	    	$pattern2 = '#^([^<]*<[^>]*bgcolor=")([^;">]{1,10})#i';
	    	if(preg_match($pattern2,$template->body)){
	    		$template->body = preg_replace($pattern2,'$1'.$styles['color_bg'],$template->body);
	    		$found = true;
	    	}//endif
	    	if(!$found){
	    		$template->body = '<div style="background-color:'.$styles['color_bg'].';" width="100%">'.$template->body.'</div>';
	    	}//endif
	    }//endif

		// check and create thumbnail folder
		$thumbPath = ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' .DS. 'thumbnail';
		if( is_dir( $thumbPath ) )
		{
			// change thumbnail folder permission
			if( !is_writable( $thumbPath .DS ) ) @chmod( $thumbPath .DS, 0777 );
       		}
       		else
       		{
       			if( is_dir( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' ) )
       			{
       				// change templates folder permission
       				if( !is_writable( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' .DS ) ) @chmod( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' .DS, 0777 );

       				// create thumbnail folder
       				if( !is_dir( $thumbPath ) ) @mkdir( $thumbPath, 0777 );
       			}
       			else
       			{
       				// change component folder permission
       				if( !is_writable( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS ) ) @chmod( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS, 0777 );
       				// create templates folder
       				if( !is_dir( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' ) ) @mkdir( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates', 0777 );
       				// create thumbnail folder
       				if( !is_dir( $thumbPath ) ) @mkdir( $thumbPath, 0777 );
       			} //endif
       		} //endif

		if ($template_id < 1) {//new template

				// upload file
				if( !empty( $template->thumbnail ) && !empty( $_FILES['file_0']))
				{
						// function source in class.mailing.php
						$path = ACA_PATH_ADMIN_THUMBNAIL_UPLOAD;
						xmailing::uploadFiles( $path );

				} //endif

				//check if the template is set to premium
				if ($template->premium && isset($template->premium)) {
					//set all template to not premium if the edited template is set to premium

					$query1 = "UPDATE `#__jnews_templates` SET ";
					$query1 .= " `premium` = 0 ";
					$database->setQuery($query1);
					$database->query();

				}//endif

				$query = "INSERT INTO `#__jnews_templates` (`name`,`description` , `body` , `altbody`, `created`, `premium` ," .
						" `namekey` , `published` , `styles`, `thumbnail` ) " .
					"\n VALUES ( '".addslashes($template->name)."', '".addslashes($template->description)."', ".
					"'".addslashes($template->body)."', ".
					"'".addslashes($template->altbody)."', ".
					"'".$template->created."', ".
					"'".$template->premium."', ".
					"'".addslashes($template->namekey)."', ".
					"'".$template->published."', ".
					"'".addslashes($template->styles)."', ".
					"'".$template->thumbnail."' )";

				$database->setQuery($query);
				$database->query();
				$erro->err = $database->getErrorMsg();

		}else{//edit here
			if (!empty($template->thumbnail)) {
				// upload file but first check and replaced old file
				if( !empty($_FILES['file_0'])){

					$path = ACA_PATH_ADMIN_THUMBNAIL_UPLOAD;
					// remove the previous image
					$query = "SELECT `thumbnail` FROM `#__jnews_templates` WHERE `template_id` = ". $template->template_id;
					$database->setQuery($query);
					$result = $database->loadResult();

					if( !empty($result) ) attachment::deleteAttachment( $result, $path );

					// function source in class.mailing.php
					// file is save to /root/components/com_jnewsletter/templates/image
					xmailing::uploadFiles( $path );
				}

				$query = "UPDATE `#__jnews_templates` SET " .
					"	`name` = '".addslashes($template->name)."', " .
					"	`description` = '".addslashes($template->description)."', " .
					"	`body` = '".addslashes($template->body)."', " .
					"	`altbody` = '".addslashes($template->altbody)."', " .
					"	`created` = '".$template->created."', " .
					"	`premium` = '".$template->premium."', " .
					"	`namekey` = '".addslashes($template->namekey)."' , " .
					"	`published` = '".$template->published."' , " .
					"	`styles` = '".addslashes($template->styles)."' , " .
					"	`thumbnail` = '".$template->thumbnail."' " .
					"	WHERE `template_id` = ". $template->template_id;
			}else{
				$query = "UPDATE `#__jnews_templates` SET " .
					"	`name` = '".addslashes($template->name)."', " .
					"	`description` = '".addslashes($template->description)."', " .
					"	`body` = '".addslashes($template->body)."', " .
					"	`altbody` = '".addslashes($template->altbody)."', " .
					"	`created` = '".$template->created."', " .
					"	`premium` = '".$template->premium."', " .
					"	`namekey` = '".addslashes($template->namekey)."' , " .
					"	`published` = '".$template->published."' , " .
					"	`styles` = '".addslashes($template->styles)."' " .
					"	WHERE `template_id` = ". $template->template_id;
			}//endif


			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();

			//set all template to not premium if the edited template is set to premium
			if ($template->premium) {
				$query1 = "UPDATE `#__jnews_templates` SET ";
				$query1 .= " `premium` = 0 ";
				$query1 .= " WHERE `template_id` <> ".$template->template_id;
				$database->setQuery($query1);
				$database->query();
			}
		}//endif

		return true;
	}//endfct

	/**
	 * <p>Funtion to get the coloum latest template added<p>
	 * return mixed
	 */
	 function getLatest($col = 'template_id'){

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$query = 'SELECT `'.$col.'` FROM `#__jnews_templates` ORDER BY `template_id` DESC LIMIT 1';


		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		if (!$erro->E(__LINE__ ,  '8300')) {
			return false;
		} else {
			$templateObj = $database->loadObject();
		}

		return $templateObj->$col;
	 }//endfct

	/**
	 * <p>Funtion to get the latest template added<p>
	 * @param - int $id - the template_id
	 * @author ijinfx
	 * return string
	 */
	 function previewTempBody($id = 'template_id'){

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$query = 'SELECT `body` FROM `#__jnews_templates` WHERE `template_id` = '.$id.' LIMIT 1';

		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		if (!$erro->E(__LINE__ ,  '8300')) {
			return false;
		} else {
			$templateObj = $database->loadObject();
		}

		return $templateObj->body;

	 }//endfct


	//function to set the default template
	function setDefault($template_id){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		//set all template to not premium except for the selected template
		$query = "UPDATE `#__jnews_templates` SET ";
		$query .= " `premium` = 0 ";
		$query .= " WHERE `template_id` <> ".$template_id;
		$database->setQuery($query);
		$database->query();

	 	//set to premium the selected template
	 	$query = "UPDATE `#__jnews_templates` SET ";
		$query .= " `premium` = '1', `published` = '1' ";
		$query .= " WHERE `template_id` = ".$template_id;
 		$database->setQuery($query);
		$database->query();
	 	$erro->err = $database->getErrorMsg();

		return $erro->E(__LINE__ ,  '8347', $database);
	}//endfct

	/*<p>Fucntion to check if it is a default template</p>
	 * @params $template_id - the id of the template
	 */
	function isDefault($template_id) {

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		if (!empty($template_id))  {
			//$query = 'SELECT `premium` FROM `#__jnews_templates` WHERE `template_id`='.intval($template_id);
			$query = 'SELECT `premium` FROM `#__jnews_templates` WHERE `template_id` = \'' . $template_id . '\' LIMIT 1';
			$database->setQuery($query);
			$id = $database->loadResult();
			$erro->err = $database->getErrorMsg();
		}
		return $erro->Ertrn( __LINE__ , '8607', $database, $id );

	}//endfct

	function publishTemplate($template_id){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
	 	$query = "UPDATE `#__jnews_templates` SET ";
		$query .= " `published` = 1 ";
		$query .= " WHERE `template_id` = ".$template_id;
 		$database->setQuery($query);
		$database->query();
	 	$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8347', $database);
	}//endfct

	function unpublishTemplate($template_id){

		//check if it is default
		//you cannot unpublish a default template
		$default = templates::isDefault($template_id);
		if ($default) {

			return false;
		}

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
	 	$query = "UPDATE `#__jnews_templates` SET ";
		$query .= " `published` = 0 ";
		$query .= " WHERE `template_id` = ".$template_id;
 		$database->setQuery($query);
		$database->query();
	 	$erro->err = $database->getErrorMsg();
		return $erro->E(__LINE__ ,  '8347', $database);

	}//endfct

	/*<p> Function to copy a certain template</p>
	 * @params $template_id - the id of the template to be copied
	 * return boolean
	 */
	function copyTemplate($template_id){

		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();
		$erro->err = 'do once';
		$template->premium = 0;
		$time = time();
		$i = 0;
     	while (!empty($erro->err) AND $i<10):
            $i++;
            $query = 'INSERT IGNORE INTO `#__jnews_templates` (`name`, `description`, `body`, `altbody`, `created`, `published`, `premium`, `ordering`, `namekey`, `styles`,`thumbnail`)';
			$query .= ' SELECT CONCAT(`name`,\'_copy\'), `description`, `body`, `altbody`, '.$time.', `published`, '.$template->premium.', `ordering`, CONCAT(`namekey`,\'_copy'.$time.'\'), `styles`,`thumbnail` FROM `#__jnews_templates` WHERE `template_id` = '.(int) $template_id;
			$database->setQuery($query);
			$database->query();
			$erro->err = $database->getErrorMsg();

         endwhile;

		if (!$erro->E(__LINE__ ,  '8308')) return false;

        return true;

	}//endfct

	/*<p>Function to get the one object list of the template</p>
	 * @params $template_id - the id the template
	 */
	function getOneTemplate($template_id) {
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif


		if ($template_id>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT * FROM `#__jnews_templates` WHERE `template_id`='.intval($template_id);
			$database->setQuery($query);
			$template = null;
					if ( ACA_CMSTYPE ) {
						$template = $database->loadObject();
					} else {
						$database->loadObject($template);
					}//endif

			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8302')) return false;
		} else {
			$template = '';
		}//endif

		if (empty($template)){
			$template->name = '';
			$template->description = '';
			$template->body = '';
			$template->altbody = '';
			$template->created = '';
			$template->published ='';
			$template->premium = '';
			$template->namekey = '';
			$template->styles = '';
			$template->thumbnail = '';
		}//endif

		$template->name = stripslashes($template->name);
		$template->description = stripslashes($template->description);
		$template->body = stripslashes($template->body);
		$template->altbody = stripslashes($template->altbody);
		$template->namekey = stripslashes($template->namekey);
		$template->styles = unserialize(stripslashes($template->styles));

		return $template;
	}//endfct

	/*<p>Function to delete a template</p>
	 * @param $template_id - id of the template
	 */
	function deleteTemplate($template_id){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		} //endif
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
		$xf = new xonfig();

		// remove template file from ftp
		// get namekey of the file... template namekey should be same with the file folder name
		$template = templates::getOneTemplate($template_id);
		if( isset( $template->namekey ) && !empty( $template->namekey ) )
		{
			// get namekey and remove file
			templates::removeTemplateFile( $template->namekey );
		} //endif

		if( isset( $template->thumbnail ) && !empty( $template->thumbnail ) )
		{
			$path = ACA_PATH_ADMIN_THUMBNAIL_UPLOAD;
			attachment::deleteAttachment( $template->thumbnail, $path );
		} //endif

		$query = 'DELETE FROM `#__jnews_templates` WHERE `template_id`='.intval($template_id);
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		$erro->E(__LINE__ ,  '8317', $database);
		return true;

	}//endfct

	function getDefault(){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}
		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$query = 'SELECT * FROM `#__jnews_templates` WHERE  `premium` = 1 AND `published` = 1';
		$database->setQuery($query);
		$database->query();
		$erro->err = $database->getErrorMsg();
		if (!$erro->E(__LINE__ ,  '8300')) {
			return false;
		} else {
			$premium = $database->loadObject();
		}
		if (empty($premium)){
			$premium->name = '';
			$premium->description = '';
			$premium->body = '';
			$premium->altbody = '';
			$premium->created = '';
			$premium->published ='';
			$premium->premium = '';
			$premium->namekey = '';
			$premium->styles = '';
			$premium->thumbnail = '';
		}//endif

		$premium->name = stripslashes($premium->name);
		$premium->description = stripslashes($premium->description);
		$premium->body = stripslashes($premium->body);
		$premium->altbody = stripslashes($premium->altbody);
		$premium->namekey = stripslashes($premium->namekey);
		$premium->styles = unserialize(stripslashes($premium->styles));

		return $premium;
	}//endfct

	 function escape($var){

        if (in_array('htmlspecialchars', array('htmlspecialchars', 'htmlentities'))) {
            return call_user_func('htmlspecialchars', $var, ENT_COMPAT, 'UTF-8');
        }//endif

        return call_user_func('htmlspecialchars', $var);
    }//endif

/*<p>Function to get the styles of the template being used in the mail</p>
 * @param $template_id - id of the template
 * @result - string styles
 */
 	function getTemplateStyles($template_id){
		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		if ($template_id>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT `styles` FROM `#__jnews_templates` WHERE `template_id`='.intval($template_id);
			$database->setQuery($query);
			$result = null;
				if ( ACA_CMSTYPE ) {
					$result = $database->loadObject();
				} else {
					$database->loadObject($result);
				}//endif

			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8302')) return false;
			$styles = unserialize($result->styles);
		} else {
			$result = '';
			$styles= '';
		}//endif

		return $styles;
 	}//endif

/*<p>Function to get template ID in the mailing table</p>
 * @param int $mailingID - id of the mail
 * @result - int template_id
 */
 	function getTemplateID($mailingID){

 		if ( ACA_CMSTYPE ) {
			$database =& JFactory::getDBO();
		}//endif
		if ($mailingID>0) {
			$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );
			$query = 'SELECT `template_id` FROM `#__jnews_mailings` WHERE `id`='.intval($mailingID);
			$database->setQuery($query);
			$result = null;
					if ( ACA_CMSTYPE ) {
						$result = $database->loadObject();
					} else {
						$database->loadObject($result);
					}//endif

			$erro->err = $database->getErrorMsg();
			if (!$erro->E(__LINE__ ,  '8302')) return false;
			$template_id = $result->template_id;
		} else {
			$result = '';
			$template_id = '';
		}//endif

		return $template_id;

 	}//endif

	/*<p>Function to insert/replace the style
	 * @param string $content - the content of the mail
	 * @param string $styles - the styles from the template
	 * @param boolean $html - if its HTML version
	 */
 	function insertStyles($content='', $text='', $styles='', $html=true){
		if ( ACA_CMSTYPE ) {
			if(isset($content) && $html){

				$replaceStyles = array();
	 			$bgStyle = array();
	 			$replaceClass = array();

				if (!empty($styles)) {
					foreach($styles as $class => $style){
						if(preg_match('#^style_(.*)$#',$class,$result)){
							$replaceStyles['#< *'.$result[1].'((?:(?!style).)*)>#Ui'] = '<'.$result[1].' style="'.$style.'" $1>';
						}elseif($class == 'color_bg'){
							$bgStyle[$class] = $style;
						}else{
							$replaceClass['class="'.$class.'"'] = 'style="'.$style.'"';
						}
					}//endforeach
				}

				if(!empty($replaceClass)){
					$content = str_replace(array_keys($replaceClass),$replaceClass,$content);
				}//endif
				if(!empty($replaceStyles)){
					$content = preg_replace(array_keys($replaceStyles),$replaceStyles,$content);
				}//endif

			}//endif

		}//endif

		return $content;

 	}//endfct

 	 /**
 	  *<p>Function to clean the content of any comments,tabs, spaces and newlines<p>
 	  *@param string $css - the css file that will be clean with any comments
 	  *@author ijinfx
 	  */
	function cleanCSSComments($css = ''){

		// remove comments
	    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);
	    // remove tabs, spaces, newlines, etc.
	    $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

	    return $css;

	}//endif

	/**
	 * <p>Function to convert the styles of the template in the database in the right CSS format which means the ways it should be presented</p>
	 * @param array $styles - the styles of the template from the database.
	 * @return string $convertedStyles
	 * @author ijinfx <gerald@ijoobi.com>
	 */
	function convertArrayStyles($styles = ''){
		if(empty($styles)) return '';
		$i = 0;
		//NOTE: we replace the whitespace if any to avoid having multiple classname
		foreach($styles as $class => $style){
			$convertedStyles[$i] = '.'.str_replace(" ", "",$class).'{';
			$convertedStyles[$i] .= $style.'}';
		$i++;
		}//endforeach
		$convertedStyles = str_replace('}',"\r\n}",str_replace('{',"{\r\n\t",implode("\r\n", $convertedStyles)));

		return str_replace(';',";\r\n\t", $convertedStyles);

	}//endfct

	/**
	 * <p>Function to process the CSS in the textbox to be an array<p>
	 * @param mixed
	 * return array
	 * @author ijinfx
	 */
	function convertCSStoArray($css = ''){
		if (empty($css)) return false;
		$customArray = array();
		$classname = '';
		$found = false;
		$css = pathinfo($css, PATHINFO_EXTENSION) == 'css' ? templates::cleanCSSComments(file_get_contents($css)) : templates::cleanCSSComments($css);

	 	//spliting to an array
	 	$cssArray = preg_split('/}/', str_replace("}", "}\r\n", $css));
		$i = 0;
		foreach($cssArray as $newcss){

			if(isset($newcss[$i])) {

				$newcssA = explode('{', $newcss);

				//check if we have multiple classname
				//$newcssA[0] is the classname
				//if we have multiple classname we explode and assign to each individual class the the styles
				if (stripos($newcssA[0], ',') !== false && sizeof(explode(',', $newcssA[0]) > 1)) {

					if (stripos($newcssA[0], ':') !== false || stripos($newcssA[0], '#') !== false)	$found = true;

					if (!$found){
						$classnames = explode(',', $newcssA[0]);
						foreach($classnames as $classname){

							//checking html tags used as css
							if (stripos($classname, '.') !== false) {
								//checking if we have combine class selector
								$classname = substr(strstr($classname, '.'), 1);

							if (stripos($classname, '.') !== false){
							echo '<br/>'._ACA_TEMP_COMBINECLASS.'(<span style="color:red;">ie. div.classname1 div.classname2{//style here}</span>)'._ACA_TEMP_COMBINECLASS_IN.' <strong>'.$newcssA[0].'</strong> '._ACA_COMBINECLASS_SUPPORT.'.<br>';

							}else{
								//checking for the combined class selector using tags
								if (stripos(trim($classname), " ") !== false){
									 echo '<br/>'._ACA_TEMP_COMBINECLASS.'(<span style="color:red;">ie. div.classname1 td fieldset{//style here}</span>) '._ACA_TEMP_COMBINECLASS_IN.' <strong>'.$newcssA[0].'</strong> '._ACA_COMBINECLASS_SUPPORT.'.<br>';

								}else{
									if (isset($newcssA[1]))$customArray[trim($classname)] = $newcssA[1];
								}//endif

							}//endif

							}else{
								echo '<br/>'._ACA_TEMP_HTMLTAG.' <span style="color:blue; font-weight: bold;">'.$classname.'</span>. '._ACA_TEMP_CONTDEV.'.<br/>';
							}//endif

						}//endforeach
					}//endif

				}else{//single classname

					if ((stripos($newcssA[0], '#') !== false) || (stripos($newcssA[0], ':') !== false)){
						echo '<br/>'._ACA_TEMP_COMBCLASSPSEUDO.' (ie. a:hover) or element id (ie. #idname) '._ACA_TEMP_COMBINECLASS_IN.' <strong>'.$newcssA[0].'</strong> '._ACA_COMBINECLASS_SUPPORT.'.<br>';
					}else{

						//checking if we have combine class selector
						$cssClassName = substr(strstr($newcssA[0], '.'), 1);

						if (stripos($cssClassName, '.') !== false){
							echo '<br/>'._ACA_TEMP_COMBINECLASS.' (<span style="color:red;">ie. div.classname1 div.classname2{//style here}</span>) '._ACA_TEMP_COMBINECLASS_IN.' <strong>'.$newcssA[0].'</strong> '._ACA_COMBINECLASS_SUPPORT.'.<br>';

						}else{
							//checking for the combined class selector using tags
							if (stripos(trim($cssClassName), " ") !== false){
								 echo '<br/>'._ACA_TEMP_COMBINECLASS.' (<span style="color:red;">ie. div.classname1 td fieldset{//style here}</span>) '._ACA_TEMP_COMBINECLASS_IN.' <strong>'.$newcssA[0].'</strong> '._ACA_COMBINECLASS_SUPPORT.'.<br>';

							}else{

								if (isset($newcssA[1]))$customArray[trim($cssClassName)] = $newcssA[1];
							}//endif

						}//endif
					}//endif

				}//endif

			}//endif
		$i++;
		}//endforeach

		return $customArray;

	}//endfct
	/**
	 * <p>Function to merge the css in the inputboxes and textbox</p>
	 * @param array $inputarray - the css styles from inputboxes
	 * @param array $txtboxarray - the css styles from the textboxes
	 * @param array $cssfile - the css array that is process from the external css
	 * @return array
	 * @author ijinfx
	 */
	function cssMerge($inputarray='', $txtboxarray='', $cssfile=''){
		if (!is_array($inputarray)) $inputarray = array();
		if (!is_array($txtboxarray)) $txtboxarray = array();
		if (!is_array($cssfile)) $cssfile = array();
		return array_flip(array_flip(array_merge($inputarray, $txtboxarray, $cssfile)));
	}//endfct


 	/* Function that will upload template
 	*/
 	function uploadTemplate()
 	{
 		$name = $_FILES['tempupload']['name'];
		$tempPath = ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS.ACA_OPTION.DS.'templates'.DS;

		// check and set permission of the template folder
		if( !empty($name) )
		{
			if( is_dir( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' ) )
			{
				if ( !is_writable( $tempPath ) ) @chmod( $tempPath, 0777 );
			}
			else
			{
				if ( !is_writable( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS.ACA_OPTION.DS ) ) @chmod( ACA_JPATH_ROOT_NO_ADMIN .'components'.DS.ACA_OPTION.DS, 0777);
				if( !is_dir( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' ) ) @mkdir( ACA_JPATH_ROOT_NO_ADMIN .'components'.DS. ACA_OPTION .DS. 'templates', 0777);
				if( !is_dir( ACA_JPATH_ROOT_NO_ADMIN .DS. 'components'.DS. ACA_OPTION .DS. 'templates' .DS. 'thumbnail' ) ) @mkdir( ACA_JPATH_ROOT_NO_ADMIN . 'templates'.DS.'thumbnail', 0777);
			}//endif
		}
		else
		{
			//failed
			return false;
		} //endif

		// upload template
		$path = ACA_JPATH_ROOT_NO_ADMIN .DS. 'components' .DS. ACA_OPTION .DS. 'templates';
		xmailing::uploadFiles( $path );

		$zip = zip_open( $tempPath . $name );
		$folderName = substr( $name, 0, -4 );

		if( !is_dir( $tempPath . $folderName ) ) mkdir($tempPath . $folderName, 0777);

		// extract files from the zip folder
		// save to the specified folder $folderName
		if( is_resource($zip) )
		{
			$bodyImgA = array();
			while($zip_entry = zip_read($zip))
			{
				$bodyImgA[] = zip_entry_name($zip_entry);
				$fp = fopen( $tempPath . $folderName .DS. zip_entry_name($zip_entry), "w");

				if(zip_entry_open($zip, $zip_entry, "r"))
				{
					$buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
					fwrite($fp,"$buf");
					zip_entry_close($zip_entry);
					fclose($fp);
				} //endif
			} //endwhile
			JRequest::setVar( 'bodyImg', $bodyImgA );
			zip_close($zip);
		}
		else
		{
			//failed
			return false;
		} //endif

		// delete zip afterwards
		if( fopen( $tempPath . $name , 'w') )
		{
			@unlink( $tempPath . $name );
		} //endif

		return true;
 	} //endfct


	/* function that will store template
	 * @param array $templateA
	*/
	function storeTemplate( $templateA )
	{
		// check parameter
		// return false
		if( empty($templateA) ) return false;

		// get columns to be insert
		$tempColumnA = array();
		foreach( $templateA as $column=>$template )
		{
			$tempColumnA[] = '`'. $column .'`';
		} //endforeach
		$tempColumn = implode( ',', $tempColumnA );

		// get column values to be insert
		$tempColumnValueA = array();
		foreach( $templateA as $column=>$template )
		{
			$tempColumnValueA[] = '"'. $template .'"';
		} //endforeach
		$tempColumnValue = implode( ',', $tempColumnValueA );

		static $database=null;
		if( !isset($database) ) $database =& JFactory::getDBO();

		$erro = new xerr( __FILE__ , __FUNCTION__ , __CLASS__ );

		$query = " INSERT INTO `#__jnews_templates` (". $tempColumn .") VALUES (". $tempColumnValue .") ";

		$database->setQuery( $query );
		$result = $database->query();

		$erro->err = $database->getErrorMsg();

		$result = ( !empty($result) ) ? true : false;
		return $result;
	} //endfct


	/* Function that will remove all the file contents and the file folder from 'components/com_jnewsletter/template/"FOLDERNAME"'
	*/
	function removeTemplateFile( $dirName )
	{
		// check parameter
		// return false if empty
		if( empty( $dirName ) ) return false;

		// removes/deletes the file from the ftp
		$dir = ACA_JPATH_ROOT_NO_ADMIN .DS. 'components' .DS. ACA_OPTION .DS. 'templates' .DS. $dirName;
		if( is_dir( $dir ) )
		{
			if( $dirOpen = opendir( $dir ) )
			{
				while( ( $dirFile = readdir( $dirOpen ) ) !== false )
				{
					if( !empty($dirFile) && ( $dirFile != '.' ) && ( $dirFile != '..' ) ) @unlink( $dir .DS. $dirFile);
				} //endwhile
			} //endif

			// after removing files from the directory specified
			// delete directory folder
			rmdir( $dir );
		} //endif

		return true;
	} //endfct

	/**
	 * Function to count the number of templates
	 * @author - ijinfx <gerald@ijoobi.com>
	 */
	function countTemplates() {
		static $database=null;

		if( !isset($database) ) $database =& JFactory::getDBO();

		$query = "SELECT count(`template_id`) FROM `#__jnews_templates`";
		$database->setQuery( $query );
		$result = $database->loadResultArray();
		$count = ( !empty($result) ) ? $result[0] : 0;
		return $count;

	} //endfct


}//endclass
