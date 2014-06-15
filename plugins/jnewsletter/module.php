	<?php
	defined('_JEXEC') OR defined('_VALID_MOS') OR die('...Direct Access to this location is not allowed...');

	$mainframe->registerEvent( 'jnewsletterbot_transformfinal', 'loadacamodule' );

	function loadacamodule($html, $text,$params){

		$regex = "#{module *=(.*)}#Ui";
		if(!preg_match_all($regex, $html, $matches)) return;

		$myAcaClass = new acamodule();
		$tagList = array();

		foreach($matches[0] as $num => $tag){
			$modID = intval($matches[1][$num]);
			$myAcaClass->_modules[$tag] = $modID;
			$tagList[$tag]->id = $modID;
		}

		$tags = $myAcaClass->_replaceModuleJoomla($tagList);


		if(!empty($tags)){
			$html = str_replace(array_keys($tags),$tags,$html);
			$text = str_replace(array_keys($tags),$tags,$text);
		}

	}//endfct


	class acamodule{
		/**
		 * $modules is a variable to store all the modules in the page so we can load them in 1 query
		 *
		 * @var array $modules
		 */
		var $_modules = array();

		/**
		 * function to replace the module on Joomla 1.5
		 *
		 * @param array $objet Tags with the arguments
		 * @return array $tags tag with equivalent
		 */
		function _replaceModuleJoomla($objet){
			global $mainframe;
			$tags = array();

			if ( method_exists( $mainframe, 'isAdmin' ) && $mainframe->isAdmin() ) {
				echo '<br/>Modules can only be loaded from the front-end or through the cron task. '.implode(',',$this->_modules);
				return true;
			}

			if(empty($this->_modules)) return $tags;

			//First we load all the modules
			$database =& JFactory::getDBO();
			$query = 'SELECT `id`, `title`,`module`, `position`, `content`, `showtitle`, `params` FROM `#__modules` WHERE `id` IN ('.implode(',',$this->_modules).')';
			$database->setQuery($query);
			$myModules = $database->loadObjectList();

			if(empty($myModules)){
				echo '<br/>Could not load the modules '.implode(',',$this->_modules);
				return $tags;
			}

			//Then we generate the content of each module
			foreach($myModules as $module){
				//determine if this is a custom module
				$module->user  	= substr( $module->module, 0, 4 ) == 'mod_' ?  0 : 1;
				$module->name = $module->user ? $module->title : substr( $module->module, 4 );
				$module->style = null;
				$module->module = preg_replace('/[^A-Z0-9_\.-]/i', '', $module->module);

				$allModules[$module->id] = $this->_showModuleJoom15($module);

			}

			foreach($objet as $tag => $arguments){
				$tags[$tag] = '';
				if(isset($allModules[$arguments->id])) $tags[$tag] = $allModules[$arguments->id];
				else{
					echo 'The module ID '.$arguments->id.' could not be found';
				}
			}

			return $tags;
		}//endfct

		/**
		 * Function _showModuleJoom15 to display a specific module
		 *
		 * @param object $module
		 * @return string content of the module
		 */
		function _showModuleJoom15($module){
			global $mosConfig_live_site, $mosConfig_sitename, $mosConfig_lang, $mosConfig_absolute_path, $mosConfig_sef;
			global $mainframe, $database, $my;
			include_once(JPATH_ROOT.DS.'includes'.DS.'application.php');

			//We always load a module from the frontend :
			$PATH = JPATH_ROOT.DS.'modules'.DS.$module->module.DS.$module->module.'.php';

			if(!file_exists($PATH)){
				echo 'The system could not load the file '.$PATH;
				return '';
			}

			// Get module parameters
			$params = new JParameter( $module->params );

			$lang =& JFactory::getLanguage();
			$lang->load($module->module);

			ob_start();
			require $PATH;
			$module->content = ob_get_contents();
			ob_end_clean();

			return $module->content;

		}//endfct
	}//endclass
