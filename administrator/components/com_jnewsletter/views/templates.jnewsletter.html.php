<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');
### Copyright (C) 2006-2010 Joobi Limited. All rights reserved.
### http://www.ijoobi.com/index.php?option=com_content&view=article&id=12&Itemid=54
/**
* <p>Template view</p>
* <p>This class contains functions to create the template view</p>
* @author Joobi Limited <wwww.ijoobi.com>
*/
class templatesHTML {

	function displayTemplateList($templates, $forms, $start, $limit, $templatesearch, $action, $setLimit=null){
		$hidden = '<input type="hidden" name="option" value="com_jnewsletter" />';
	   	//$hidden .= '<input type="hidden" name="boxchecked" value="0" />';
	    //$hidden .= '<input type="hidden" name="act" value="'.$action.'" />';
	   	$hidden .= '<input type="hidden" name="limit" value="'.$limit.'" />';

		//echo jnewsletter::search($forms['filter'],$hidden, $templatesearch, 'templatesearch', null );
		?>

		<?php

			echo $forms['main'];
			// for search
			$toSearch = null;
			$toSearch->forms = $forms['filter'];
			$toSearch->hidden = $hidden;
			$toSearch->listsearch = $templatesearch;
			$toSearch->id = 'templatesearch';

			echo jnewsletter::setTop( $toSearch, null, $setLimit );

		?>
		<table class="joobilist">
			<thead>
				<tr>
					<th width="2%" class="title">#</th>
					<th width="2%" class="title"></th>
					<th width="22%" class="title">
					<?php echo JHTML::_('grid.sort', _ACA_TEMPLATE_NAME, 'a.name', '',''); ?>
					</th>
					<th width="65%" class="title"><?php echo _ACA_TEMPLATE_DESC; ?></th>
					<th width="3%" class="title"><?php echo _ACA_TEMPLATE_DEFAULT; ?></th>
					<th width="3%" class="title"><?php echo _ACA_TEMPLATE_PUBLISH; ?></th>
					<th width="2%" class="title">ID</th>
				</tr>
			</thead>
			</form>
			<?php

				$i=0;
				foreach($templates as $template){

					//for publish/unpublish
				if ($template->published == 1) {
					$img = '16/status_g.png';
					$alt = 'Published';
					jnewsletter::getLegend( 'status_g.png', _ACA_TEMPLATE_PUBLISH );
				} else {
					$img = '16/status_r.png';
				  	$alt = 'Unpublished';
				  	jnewsletter::getLegend( 'status_r.png', _ACA_UNPUBLISHED );
				}//endif
			?>
				<tr class="row<?php echo ($i + 1) % 2;?>">
					<td><center><?php echo $i+1; ?></center></td>
					<td align="center">	<input type="radio" name="template_id" value="<?php echo $template->template_id; ?>" onclick="isChecked(this.checked);" /></td>
					<td>
						<span class="editlinktip">
							<?php
								$link = ACA_JPATH_LIVE .DS. 'administrator' .DS. 'index.php?option=com_jnewsletter&act=templates&task=edit&template_id='. $template->template_id;
								$namelink = '<a href="'. $link .'">'. $template->name .'</a>'; //
								$path = ACA_PATH_ADMIN_THUMBNAIL_SHOW. $template->thumbnail;
								$tip = jnewsletter::imageResize($path , '200', '200', $template->thumbnail);
								echo compa::toolTip($tip, $template->namekey, '', 'tooltip.png', $template->name, $link, 0 );
						 	?>
						</span>
					</td>
					<td><?php echo $template->description;?></td>
					<td align="center">
						<?php
							if ($template->premium)
							{
								echo '<img src="'.ACA_PATH_ADMIN_IMAGES.'16/default.png" title="Default" alt="Default">';
								jnewsletter::getLegend( 'default.png', _ACA_TEMPLATE_DEFAULT );
							}else {
								$status = ( !empty($template->premium) && ( $template->premium == 1 ) ) ? '' : 'default';
								$link = jnewsletter::createToggleLink( 'templates', $status, 'template_id' , $template->template_id, 'togle' );

								echo '<a href="'. $link .'"> <b>-</b> </a>';
							}
						?>
					</td>
					<td align="center">
						 <?php
						 	if ($template->premium)
						 	{
						 		echo '<img src="'. ACA_PATH_ADMIN_IMAGES.$img .'" alt="'.$alt.'" title="'. $alt .'">';
						 	}
						 	else
						 	{
						 		$status = ( !empty($template->published) && ( $template->published == 1 ) ) ? 'unpublish' : 'publish';
						 		$link = jnewsletter::createToggleLink( 'templates', $status, 'template_id' , $template->template_id, 'togle' );

						 		echo '<a href="'. $link .'"> <img src="'. ACA_PATH_ADMIN_IMAGES.$img .'" alt="'.$alt.'" title="'. $alt .'"> </a>';
						 	} //endif
						 ?>
					</td>
					<td align="center"><?php echo $template->template_id;?></td>
				</tr>
			<?php $i=$i+1;
				}//endforeach
			//}//endif
			?>
		</table>
		<?php

		echo '<br />';
		echo jnewsletter::setLegend();
	}//endfunction


	function createTemplate(&$template,$form){

		$template->name = ( isset($template->name) ) ? $template->name : '';
		$template->namekey = ( isset($template->namekey) ) ? $template->namekey : '';
		$template->published = ( isset($template->published) ) ? $template->published : 0;
		$template->premium = ( isset($template->premium) ) ? $template->premium : 0;
		$template->thumbnail = ( isset($template->thumbnail) ) ? $template->thumbnail : '';
		$template->description = ( isset($template->description) ) ? $template->description : '';
		$template->body = ( isset($template->body) ) ? $template->body : '';
		$template->altbody = ( isset($template->altbody) ) ? $template->altbody : '';
		$template->styles = (isset($template->styles)) ? $template->styles : '';

		if ( ACA_CMSTYPE ) {
			$editor =& JFactory::getEditor();
			if(!$GLOBALS[ACA.'disabletooltip']){
				JHTML::_('behavior.tooltip');
		}

		$text = str_replace('"', '&quot;' , $template->name);
		$namekey = str_replace('"', '&quot;' , $template->namekey);
		if (function_exists('htmlspecialchars_decode')) {
			$text = htmlspecialchars_decode( $text , ENT_NOQUOTES);
			$namekey = htmlspecialchars_decode( $namekey , ENT_NOQUOTES);
		} elseif (function_exists('html_entity_decode')) {
			$text = html_entity_decode( $text , ENT_NOQUOTES);
			$namekey = html_entity_decode( $namekey , ENT_NOQUOTES);
		}
			$readOnlyNamekey = ( !empty($namekey) ) ? 'READONLY' : '';

			$styles = $template->styles;

			$styles['color_bg'] = (!empty($styles) && isset($styles['color_bg'])) ? $styles['color_bg'] : '#FFFFFF';
			$styles['cssfile'] = (!empty($styles) && isset($styles['cssfile'])) ? $styles['cssfile'] : '';
			$templateHTML['name'] = '<input type="text" name="template_name" class="inputbox" size="50" maxlength="64" value="' . $text .'" />';
			$templateHTML['namekey'] = '<input type="text" name="template_namekey" class="inputbox" size="50" maxlength="64" value="' . $namekey .'" '.$readOnlyNamekey.' />';
			$templateHTML['publish'] = JHTML::_('select.booleanlist', 'confirmed', 'class="inputbox"', $template->published );
			$templateHTML['premium'] = JHTML::_('select.booleanlist', 'premium', 'class="inputbox"', $template->premium );
			$templateHTML['bgcolor'] = jnewsletter::colorPicker('styles[color_bg]', 15, $styles['color_bg']);
			$templateHTML['thumbnail'] = templatesHTML::_attachment( $template->thumbnail );
			$templateHTML['description'] = '<textarea rows="10" cols="60" name="description">'.$template->description.'</textarea>';
			$templateHTML['cssfile'] = '<div id="cssfile" style="display:none;"><input type="text" name="styles[cssfile]" style="margin: 2px 0 2px 2px;" class="inputbox" size="45" value="'.templates::escape(@$styles['cssfile']).'" />';
			$templateHTML['cssfile'] .= '<input type="button" onclick="javascript:hideMainMenu(); submitbutton(\'apply\')" style="margin: 2px 0 2px 2px;" name="Process External CSS" class="button" value="'._ACA_EXTERNALCSS_PROCESS.'"></div>';
		unset($styles['cssfile']);
		}//endif


			echo $form['main'];
		?>
			<table cellpadding="1" cellspacing="0" border="0" width="99%">
				<tbody>
					<tr>
						<td width="<?php echo $GLOBALS[ACA.'type']=='PLUS' || $GLOBALS[ACA.'type']=='PRO' ? '50%' : '99%';?>" valign="top">
							<fieldset style="margin-top:7px;">
								<?php
									echo jnewsletter::beginingOfTable('jnewslettertable');
									echo jnewsletter::miseEnHTML( _ACA_TEMPLATE_NAME , _ACA_TEMPLATE_NAME_T, $templateHTML['name']);
									echo jnewsletter::miseEnHTML( _ACA_TEMPLATE_ALIAS , _ACA_TEMPLATE_NAMEKEY_T , $templateHTML['namekey']);
									echo jnewsletter::miseEnHTML( _ACA_TEMPLATE_PUBLISH , _ACA_TEMPLATE_PUBLISH_T ,$templateHTML['publish']);
									echo jnewsletter::miseEnHTML( _ACA_TEMPLATE_DEFAULT , _ACA_TEMPLATE_DEFAULT_T ,$templateHTML['premium']);
									echo jnewsletter::miseEnHTML( _ACA_TEMPLATE_BG , _ACA_TEMPLATE_BG_T ,$templateHTML['bgcolor']);
									echo jnewsletter::miseEnHTML( _ACA_TEMPLATE_UPLOAD ,_ACA_TEMPLATE_UPLOAD_T ,$templateHTML['thumbnail']);
									echo jnewsletter::miseEnHTML( _ACA_TEMPLATE_DESC , _ACA_TEMPLATE_DESC_T ,$templateHTML['description']);
									echo jnewsletter::endOfTable();
							 ?>
							</fieldset>
						</td>
						<td width="<?php echo $GLOBALS[ACA.'type']=='PLUS' || $GLOBALS[ACA.'type']=='PRO' ? '49%' : '0%';?>" valign="top">
								<?php

								if($GLOBALS[ACA.'type']=='PLUS' || $GLOBALS[ACA.'type']=='PRO'){

									$switchjs = ' function switchContent() {
										        var option=[\'jNewsStyles\',\'jNewsCSSTextbox\'];
										        for(var i=0; i<option.length; i++)
										        { obj=document.getElementById(option[i]);
										        obj.className=(obj.className=="visible")? "hidden" : "visible"; }
										        }
										        function showInput() {
													var el = document.getElementById(\'cssfile\');
													if ( el.style.display != \'none\' ) {
														el.style.display = \'none\';
													}
													else {
														el.style.display = \'\';
														el.focus();
													}
												}';
									$jnewscss = '.visible {display:block;}
											     .hidden {display:none;}';

									if ( ACA_CMSTYPE ) {// joomla 15
										$doc =& JFactory::getDocument();
									}//endif
									$doc->addScriptDeclaration( $switchjs );
									$doc->addStyleDeclaration($jnewscss);
									echo '<a name="cssfileindex">';
									templatesHTML::_styles($styles);
									echo '</a>';
									echo '<div id="jNewsCSSTextbox" style="padding: 4px;" class="hidden">'.templatesHTML::_csstextbox($styles).'</div>';
									echo '<div class="button2-left">';
									echo '<div class="blank"><a href="#" style="cursor: hand;" onclick="switchContent()" title="Toggle Template Styling" >'._ACA_CSS_TOGGLESTYLE.'</a></div>';
									echo '</div>';
									echo '<div class="button2-left">';
									echo '<div class="blank"><a href="#cssfileindex" style="cursor: hand;" onclick="showInput()" title="Click to Input External CSS" >'._ACA_EXTERNALCSS_LINK.'</a></div>';
									echo '</div>';
									echo $templateHTML['cssfile'];

								}else{
									echo '';
								}
								?>
						</td>
					</tr>
					<tr>
						<td colspan="2" width="100%">
							<fieldset class="jnewslettercss">
								<legend>
									<?php echo _ACA_HTML_VERSION; ?>
								</legend>
								<?php if (ACA_CMSTYPE) echo $editor->display( 'template_body',  $template->body , '99%', '800', '75', '50', true ) ;?>
							</fieldset>
							<!---<fieldset class="jnewslettercss">-->
							<!---	<legend>-->
							<!---		<?php echo _ACA_NONHTML_VERSION; ?>-->
							<!---	</legend>-->
							<!---	<textarea name="alt_body" rows="20" cols="70" style="width: 100%; height: 400px;"><?php echo $template->altbody ; ?></textarea>-->
							<!---</fieldset>-->
						</td>
					</tr>
				</tbody>
			</table>
		<?php
	}//endfct


	/* Function that will create attachments of files
	 * @param $fieldName - name of the field for REQUEST purpose
	 * @return text
	 * Author : Gino <gino@ijoobi.com>
	*/
	function _attachment( $thumbnail )
	{
		$display = '<script src="'.ACA_PATH_ADMIN_INCLUDES .'multifile.js"></script>
			<input id="my_file_element" type="file" name="file_1" > </input>

			<br /><b>'. _ACA_FILES .':</b>

			<div id="files_list"></div>
			<script>

				var multi_selector = new MultiSelector( document.getElementById( "files_list" ), 1 );
				multi_selector.addElement( document.getElementById( "my_file_element" ) );
			</script>';

		if( !empty($thumbnail) )
		{
       			$path = ACA_PATH_ADMIN_THUMBNAIL_SHOW. $thumbnail;
			$img = jnewsletter::imageResize($path , '200' , '200', $thumbnail);
			$display .= '<br>'.$img;
			$display .= '<br>'. compa::toolTip( $img , $thumbnail, '', '', $thumbnail );
		} //endif

		return $display;
	} //endfct

	/**
	 * <p>Function for the CSS textbox</p>
	 * @param array $styles - the styles of the template
	 * return mixed
	 * author ijinfx <gerald@ijoobi.com>
	 */
	function _csstextbox($styles=''){

		if (isset($styles['color_bg'])) unset($styles['color_bg']);
		$textarea = '';
		$textarea .= '<textarea class="textarea" cols="83" rows="25" name="template_customcss">';
		$textarea .= sizeof($styles > 0) ? templates::convertArrayStyles($styles) : _ACA_CUSTOMCSS;
		$textarea .= '</textarea>';

		return $textarea;
	}//endfct

	function _styles($styles){
			$script = 'function addNewStyle(){
								var divnewstyle=window.document.getElementById("divnewstyle");
								var input = document.createElement(\'input\');
								var input2 = document.createElement(\'input\');
								input.type = \'text\';
								input2.type = \'text\';
								input.size = \'30\';
								input2.size = \'30\';
								input.name = \'otherstyles[classname][]\';
								input2.name = \'otherstyles[style][]\';
								input.setAttribute(\'style\', \'margin-top:4px;\');
								input2.setAttribute(\'style\', \'margin-top:4px; margin-left: 68px;\');
								input.value = "'._ACA_TEMPLATE_STYLE_NEWC.'";
								input2.value = "'._ACA_TEMPLATE_STYLE_NEWAPPLIED.'";
								divnewstyle.appendChild(document.createElement(\'br\'));
								divnewstyle.appendChild(input);
								divnewstyle.appendChild(input2);}

					function removeStyle(child){
							  var child = document.getElementById(\'child\');
					          var parent = document.getElementById(\'jNewsStyles\');
					          parent.removeChild(\'child\');
						}';
				$doc =& JFactory::getDocument();
				$doc->addScriptDeclaration( $script);

		?>
		<div id="jNewsStyles" class="visible">
		<fieldset class="adminform" width="100%">
					<legend><?php echo 'Styles';?> </legend>
					<table width="100%">
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['style_h1']);?>"><?php echo _ACA_TEMPLATE_STYLE_TH1; ?></span></td>
							<td><input type="text" size="30" name="styles[style_h1]" value="<?php echo templates::escape(@$styles['style_h1']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['style_h2']);?>"><?php echo _ACA_TEMPLATE_STYLE_TH2; ?></span></td>
							<td><input type="text" size="30" name="styles[style_h2]" value="<?php echo templates::escape(@$styles['style_h2']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['style_h3']);?>"><?php echo _ACA_TEMPLATE_STYLE_TH3; ?></span></td>
							<td><input type="text" size="30" name="styles[style_h3]" value="<?php echo templates::escape(@$styles['style_h3']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['style_h4']);?>"><?php echo _ACA_TEMPLATE_STYLE_TH4; ?></span></td>
							<td><input type="text" size="30" name="styles[style_h4]" value="<?php echo templates::escape(@$styles['style_h4']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['style_a']);?>">a</span></td>
							<td><input type="text" size="30" name="styles[style_a]" value="<?php echo templates::escape(@$styles['style_a']); ?>"/></td>
						</tr>
						<tr>
							<td><ul style="<?php echo templates::escape(@$styles['style_ul']);?>"><li style="<?php echo templates::escape(@$styles['style_li']);?>">ul</li><li style="<?php echo templates::escape(@$styles['style_li']);?>">li</li></ul></td>
							<td><input type="text" size="30" name="styles[style_ul]" value="<?php echo templates::escape(@$styles['style_ul']); ?>"/>
							<br/><input type="text" size="30" name="styles[style_li]" value="<?php echo templates::escape(@$styles['style_li']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['aca_unsubscribe']);?>"><?php echo _ACA_TEMPLATE_STYLE_UNSUB; ?></span></td>
							<td><input type="text" size="30" name="styles[aca_unsub]" value="<?php echo templates::escape(@$styles['aca_unsub']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['aca_subscribe']);?>"><?php echo _ACA_TEMPLATE_STYLE_SUB; ?></span></td>
							<td><input type="text" size="30" name="styles[aca_unsub]" value="<?php echo templates::escape(@$styles['aca_unsub']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['aca_content']);?>"><?php echo _ACA_TEMPLATE_STYLE_CONTENT; ?></span></td>
							<td><input type="text" size="30" name="styles[aca_content]" value="<?php echo templates::escape(@$styles['aca_content']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['aca_title']);?>"><?php echo _ACA_TEMPLATE_STYLE_CHEAD; ?></span></td>
							<td><input type="text" size="30" name="styles[aca_title]" value="<?php echo templates::escape(@$styles['aca_title']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['aca_readmore']);?>"><?php echo _ACA_TEMPLATE_STYLE_CREADMORE; ?></span></td>
							<td><input type="text" size="30" name="styles[aca_readmore]" value="<?php echo templates::escape(@$styles['aca_readmore']); ?>"/></td>
						</tr>
						<tr>
							<td><span style="<?php echo templates::escape(@$styles['aca_online']);?>"><?php echo _ACA_TEMPLATE_STYLE_VONLINE; ?></span></td>
							<td><input type="text" size="30" name="styles[aca_online]" value="<?php echo templates::escape(@$styles['aca_online']); ?>"/></td>
						</tr>
						<?php
							if ($GLOBALS[ACA.'show_jcalpro'] and class_exists('pro')){
								$jcal .= '';
								$jcal .= '<tr><td><span style="'.templates::escape(@$styles['aca_jcalcontent']).'">'. _ACA_TEMPLATE_STYLE_JCALCONTENT.'</span></td>';
								$jcal .= '<td><input type="text" size="30" name="styles[aca_jcalcontent]" value="'.templates::escape(@$styles['aca_jcalcontent']).'"/></td></tr>';
								$jcal .= '<tr><td><span style="'.templates::escape(@$styles['aca_jcaltitle']).'">'. _ACA_TEMPLATE_STYLE_JCALTITLE.'</span></td>';
								$jcal .= '<td><input type="text" size="30" name="styles[aca_jcaltitle]" value="'.templates::escape(@$styles['aca_jcaltitle']).'"/></td></tr>';
								echo $jcal;
								unset($styles['aca_jcalcontent']);unset($styles['aca_jcaltitle']);
							}

						?>
						<?php
						unset($styles['aca_unsubscribe']); unset($styles['aca_subscribe']); unset($styles['aca_content']); unset($styles['aca_title']); unset($styles['aca_readmore']); unset($styles['aca_online']);
						unset($styles['style_a']);unset($styles['style_ul']);unset($styles['style_li']);unset($styles['style_h1']);unset($styles['style_h2']);unset($styles['style_h3']); unset($styles['style_h4']);
						unset($styles['color_bg']);
						if(!empty($styles) && $GLOBALS[ACA.'type']=='PRO'){
							foreach($styles as $className => $style){
							?>
								<tr>
									<td>
										<span id="jnews<?php echo $className;?>" style="<?php echo templates::escape($style);?>"><?php echo $className ?></span>
									</td>
									<td>
										<input id="jnews<?php echo $className;?>" type="text" size="30" name="styles[<?php echo $className; ?>]" value="<?php echo templates::escape($style); ?>"/>
									</td>

								</tr>
							<?php

							}//endforeach
						}?>
						<tr>
					</table>
					<?php if($GLOBALS[ACA.'type']=='PRO'){ ?>
					<div id="divnewstyle"></div>
					<a href="javascript:void(0);" onclick='addNewStyle()'><?php echo _ACA_TEMPLATE_STYLE_NEW; ?></a>
					<?php } ?>
				</fieldset>
				</div>

		<?php
	}//enfct

 }//endclass
