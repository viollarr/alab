<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
/**
* <p>Templates controller</p>
* <p>This function is the controller to view the templates view</p>
* @author Joobi Limited <wwww.ijoobi.com>
*/
function templates( $action, $task, $template_id) {

	$my	=& JFactory::getUser();
	$css = '.icon-48-templates { background-image:url('.ACA_PATH_ADMIN_IMAGES .'header/templates.png)}';
	$doc =& JFactory::getDocument();
	$doc->addStyleDeclaration($css, $type = 'text/css');
	$img = 'templates.png';
	$templatesearch = JRequest::getVar('templatesearch', '' );
    	$showTemplates = true;

	// defined toggle for publish and unpublish of mailings
	$willRedirect=false;
	if( !empty($task) && ( $task == 'togle' ) )
	{
		$id = JRequest::getVar( 'templateid' );
		$col = JRequest::getVar( 'col' );

		$template_id = ( !empty( $id ) && !empty($col) ) ? $id : $template_id;
		$task = ( !empty( $template_id ) && !empty($col) ) ? $col : $task;

		$willRedirect = true;
	} //endif
	switch ($task) {
		case ('new') :
		case ('add') :
			$showTemplates = false;
			$template = null;
	    	$form['main'] = " <form action='index.php' method='post' name='adminForm' enctype='multipart/form-data'> \n" ;
	    	$message = ( isset($message) ) ? $message : '';
		    backHTML::_header( _ACA_TEMPLATES , 'templates.png' , $message, $task, $action );
		    backHTML::formStart('template' , 0 ,''  );
		   	echo templatesHTML::createTemplate($template, $form);
		    $go[] = jnewsletter::makeObj('act', $action);
			backHTML::formEnd($go);
			break;
		case ('edit') :
			$showTemplates = false;
			$template = templates::getOneTemplate($template_id);
			$form['main'] = " <form action='index.php' method='post' name='adminForm' enctype='multipart/form-data'> \n" ;
			$message = ( isset($message) ) ? $message : '';
		    backHTML::_header( _ACA_TEMPLATES , 'templates.png' , $message, $task, $action );
		    backHTML::formStart('template' , 0 ,''  );
		   	echo templatesHTML::createTemplate($template,$form);
		    $go[] = jnewsletter::makeObj('act', $action);
			$go[] = jnewsletter::makeObj('template_id', $template_id);
			backHTML::formEnd($go);
			break;
		case ('save') :
			$message = jnewsletter::printYN( templates::saveTemplate($task , $template_id) ,  _ACA_MAILING_SAVED , _ACA_ERROR );
			compa::redirect( 'index.php?option=com_jnewsletter&act=templates');
			break;
		case ('apply') :
			$message = jnewsletter::printYN( templates::saveTemplate($task , $template_id) ,  _ACA_MAILING_SAVED , _ACA_ERROR );
			$id = empty($template_id) ? templates::getLatest() : $template_id;
			compa::redirect( 'index.php?option=com_jnewsletter&act=templates&task=edit&template_id='.$id);
			break;
		case ('publish') :
	     	$message = jnewsletter::printYN( templates::publishTemplate($template_id) ,  _ACA_PUBLISHED , _ACA_ERROR );
			compa::redirect( 'index.php?option=com_jnewsletter&act=templates' );
			break;
	   	case ('unpublish') :
	   		$message = jnewsletter::defaultYN( templates::unpublishTemplate($template_id) ,  _ACA_UNPUBLISHED , 'Unable to set to default unpublished template!' );
			templates::unpublishTemplate($template_id);
			if( $willRedirect ) compa::redirect( 'index.php?option=com_jnewsletter&act=templates' );
			break;
		case ('copy') :
			templates::copyTemplate($template_id);
			$showTemplates = true;
			break;
		case ('default') :
			$message = jnewsletter::printYN( templates::setDefault($template_id), _ACA_TEMPLATE_DEFAULT_SUCCS , _ACA_ERROR );
			compa::redirect( 'index.php?option=com_jnewsletter&act=templates' );
			break;
		case ('delete') :
			$showTemplates = true;
			$isDefault = templates::isDefault($template_id);

			if (!$isDefault) {
				$message = jnewsletter::printYN( templates::deleteTemplate($template_id) ,  _ACA_TEMPLATE. _ACA_SUCCESS_DELETED , _ACA_ERROR );
			}else{
				$message = jnewsletter::printM('red' , _ACA_TEMPLATE_DEFAULT_NODEL );
			}//endif
			break;
		case ('cpanel') :
			backHTML::controlPanel();
			return true;
			break;
		case ('toggle') :
			// main toggle for all usage
			$listid = JRequest::getVar( 'listid' );
			$column = JRequest::getVar( 'col' );

			if( !empty($listid) && !empty($column) )
			{
				$passObj = null;
				$passObj->tableName = '#__jnews_lists';
				$passObj->columnName = $column;
				$passObj->whereColumn = 'id';
				$passObj->whereColumnValue = $listid;

				jnewsletter::toggle( $passObj );
			} //endif

			compa::redirect( 'index.php?option=com_jnewsletter&act=templates' );
			break;
		case 'tempupload' :
			// HTML for upload template
			$html = '';
			$html .= '<form action="index.php?option=com_jnewsletter&act=templates&task=upload" method="post" name="adminForm" enctype="multipart/form-data">';
			$html .= '<table style="width:100%;padding:100px;">';
			$html .= '<tr>';
			$html .= '<td style="text-align:center;"> <input type="FILE" name="tempupload"> </td>';
			$html .= '</tr><tr">';
			$html .= '<td style="text-align:center;padding:20px;"> <input type="submit" value="Upload Template" style="width:130px;height:25px;"> </td>';
			$html .= '</tr>';
			$html .= '</table>';
			$html .= '</form><br/><br/>';

			echo $html;

			$showTemplates = false;
			break;
		case 'upload' :

			$fileName = $_FILES[ 'tempupload' ][ 'name' ];
			$folderName = substr( $fileName, 0, -4 );

			// explode to array to compare and check if the uploaded file is a zip file
			$type = $_FILES[ 'tempupload' ][ 'type' ];
			$type = explode( '/', $type );

			// if zip is not found then return to previous upload page
			if( !in_array( 'zip', $type ) )
			{
				echo "<script> alert('".addslashes(_ACA_UPLOAD_ZIP_INVALID)."'); document.location.href='index.php?option=com_jnewsletter&act=templates&task=new';</script>";
				break;
			} //endif

			$result = templates::uploadTemplate();
			if( $result )
			{
				// if success
				// read index.html of file for template body content
				$tempPath = ACA_JPATH_ROOT_NO_ADMIN .DS.'components'.DS.ACA_OPTION.DS.'templates'.DS;
				$file = fopen($tempPath.$folderName.DS.'index.html', "r") or exit("Unable to open file!");

				$tempbody = array();
				while(!feof($file))
			  	{
			 	 	$tempbody[]= fgets($file);
			 	} //endwhile
			 	fclose($file);
				$tempbody = implode( ' ', $tempbody );

				// replace source image paths from 'images/' to 'administrator/components/com_jnewsletter/templates/$FOLDERNAME/'
				$bodyImgA = JRequest::getVar( 'bodyImg' );
				if( !empty( $bodyImgA  ) )
				{
					foreach( $bodyImgA as $bodyImg )
					{
						$body = preg_replace('#images\/#', 'components' .DS. ACA_OPTION .DS. 'templates' .DS. $folderName .DS , $tempbody);
					} //endforeach
				}
				else
				{
					$body = $tempbody;
				} //endif

				$template=null;
				$template->name = ucfirst($folderName);
				$template->description = '';
				$template->created = jnewsletter::getNow();
				$template->body = addslashes($body);
				$template->altbody = '';
				$template->premium = 0;
				$template->namekey = $folderName;
				$template->published = 1;
				$template->styles = '';
				$template->thumbnail = '';

				$templateA = (array) $template;

				// store template
				templates::storeTemplate( $templateA );

				// upload success
				// display success message
				//echo jnewsletter::printM('green' , _ACA_TEMPLATE_UPLOAD_SUCCESS );
				echo "<script> alert('". addslashes(_ACA_TEMPLATE_UPLOAD_SUCCESS) ."'); document.location.href='index.php?option=com_jnewsletter&act=templates';</script>";
			}
			else
			{
				// failed uploading
				// display an error message
				//echo jnewsletter::printM('red' , _ACA_TEMPLATE_UPLOAD_FAIL );
				echo "<script> alert('". addslashes(_ACA_TEMPLATE_UPLOAD_FAIL) ."'); document.location.href='index.php?option=com_jnewsletter&act=templates&task=new';</script>";
			} //endif

			$showTemplates = false;
			break;
		case 'preview' :
			$id = JRequest::getInt('template_id', 0, 'request');
			$body = templates::previewTempBody($id);
			echo $body;
			$showTemplates = false;
			break;
	} //endswitch


	 if ($showTemplates) {
	 	if ( ACA_CMSTYPE ) {	// joomla 15
			$start = JRequest::getVar('start', '0' );
			$templatesearch = JRequest::getVar('templatesearch', '' );
	 	}//endif
	 	$limit = -1;
	 	$message = ( isset($message) ) ? $message : '';
		backHTML::_header( _ACA_TEMPLATES , $img , $message , $task, $action  );
   		$forms['main'] = " <form action='index2.php' method='post' name='adminForm'> \n" ;
		$forms['filter'] = " <form name='jNewsletterFilterForm' method='POST' action='index2.php'> \n" ;
		backHTML::formStart('show_template' , ''  ,'' );

		// added this code for pagination ===========================
		$paginationStart = JRequest::getVar( 'pg' );

		if( !empty($paginationStart) )
		{
			$limitstart = 0;
			$limitend = $paginationStart;
		}
		else
		{
			$app =& JFactory::getApplication();
			$limitstart = $app->getUserStateFromRequest( 'limitstart', 'limitstart', 0, 'int' );
			$limitend = $app->getUserStateFromRequest( 'limit', 'limit', 0, 'int' );
		} //endif
		//$limittotal = lists::getListCount( $listType );
		$limittotal = templates::countTemplates(  );
		$setLimit = null;
		$setLimit->total = ( !empty($limittotal) ) ? $limittotal : 0;
		$setLimit->start = ( !empty( $limitstart ) ) ? $limitstart : 0;
		$setLimit->end = ( !empty($limitend) ) ? $limitend: 20;
// ====================================

		$templates = templates::getTemplates(false, false, true, $templatesearch, $setLimit->start, $setLimit->end);
		templatesHTML::displayTemplateList($templates, $forms, $start, $limit, $templatesearch, $action, $setLimit);
		$go[] = jnewsletter::makeObj('act', 'templates');
		backHTML::formEnd($go);

	 }

	return true;
}//enfct

