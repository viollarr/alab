<?php

jimport('joomla.plugin.plugin');
jimport('joomla.filesystem.*');
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.archive');

class Atomicon
{
    /*************************************************************
    * General Helpers
    * general functions to retreive component information
    ************************************************************/
    /**
     * Atomicon::errors()
     *
     * @param bool $show
     * @return
     */
    function errors($show = true)
    {
        error_reporting(E_ALL);
        ini_set('display_errors', $show ? '1' : '0');
    }
    /**
     * Atomicon::debug()
     *
     * @param mixed $mixed
     * @return
     */
    function debug($mixed)
    {
        echo "<pre style=\"border: 1px solid gray;\">";
        var_dump($mixed);
        echo "</pre>";
    }

    /**
     * Atomicon::cleanString()
     *
     * @param mixed $str
     * @return
     */
    function cleanString($str)
    {
        $str = preg_replace("/[^a-zA-Z0-9_\s]/", "", $str);
        return $str;
    }

    /**
     * Atomicon::download()
     *
     * @param mixed $url
     * @param integer $timeout
     * @return
     */
    function download($url, $timeout = 10)
    {
        $file_contents = @file_get_contents($url);
        if ($file_contents === false)
        {
            $ch = curl_init();
            if ($ch !== false)
            {
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                $file_contents = curl_exec($ch);
                curl_close($ch);
            }
        }
        return ($file_contents) ? $file_contents : false;
    }

    /**
     * Atomicon::encodeData()
     *
     * @param mixed $mixed
     * @return
     */
    function encodeData($mixed)
    {
        return @base64_encode(serialize($mixed));
    }
    
    /**
     * Atomicon::decodeData()
     *
     * @param mixed $mixed
     * @return
     */
    function decodeData($mixed)
    {
        return @unserialize(base64_decode($mixed));
    }
    
    /**
     * Atomicon::loadHelpers()
     *
     * @return
     */
    function loadHelpers()
    {
        $count = 0;
        $files = JFolder::files(dirname(__file__), ".php", true, true);
        foreach ($files as $file)
        {
            require_once ($file);
            $count++;
        }
        return $count;
    }

    /**
     * Atomicon::tmpl()
     *
     * @param mixed $template
     * @param mixed $obj_or_array
     * @return
     */
    function tmpl($template, $obj_or_array)
    {
        foreach ($obj_or_array as $key => $value)
        {
            $template = str_replace('{' . $key . '}', $value, $template);
        }
        return $template;
    }

    /**
     * Atomicon::resize()
     *
     * @param mixed $width
     * @param mixed $height
     * @param mixed $max_width
     * @param mixed $max_height
     * @return
     */
    function resize($width, $height, $max_width, $max_height)
    {
        $max_width = ((int)$max_width <= 0) ? $width : $max_width;
        $max_height = ((int)$max_height <= 0) ? $height : $max_height;

        $x_ratio = $max_width / $width;
        $y_ratio = $max_height / $height;

        if (($width <= $max_width) && ($height <= $max_height))
        {
            $tn_width = $width;
            $tn_height = $height;
        } elseif (($x_ratio * $height) < $max_height)
        {
            $tn_height = ceil($x_ratio * $height);
            $tn_width = $max_width;
        }
        else
        {
            $tn_width = ceil($y_ratio * $width);
            $tn_height = $max_height;
        }
        return array("width" => $tn_width, "height" => $tn_height);
    }

    /**
     * Atomicon::fileFilter()
     *
     * @param string $file_types
     * @return
     */
    function fileFilter($file_types = "jpg|jpeg|gif|bmp|png")
    {
        return "\.(" . strtolower($file_types) . "|" . strtoupper($file_types) . ")$";
    }

    /**
     * Atomicon::fixPath()
     *
     * @param mixed $path
     * @param bool $addslash
     * @return
     */
    function fixPath($path, $addslash = true)
    {
        $path = DS == '\\' ? str_replace('/', '\\', $path) : $path;
        if (($len = strlen($path)) > 0)
        {
            if ($addslash)
            {
                if (substr($path, $len - 1) != DS)
                {
                    $path .= DS;
                }
            }
            else
            {
                $path = rtrim($path, DS);
            }
        }
        $path = DS == '\\' ? str_replace('\\\\', '\\', $path) : str_replace('//', '/', $path);
        return $path;
    }

    /**
     * Atomicon::fixURL()
     *
     * @param mixed $url
     * @param bool $addslash
     * @return
     */
    function fixURL($url, $addslash = true)
    {
        $url = DS == '\\' ? str_replace('\\', '/', $url) : $url;
        $url = rtrim($url, '/');
        if ($addslash)
        {
            $url .= '/';
        }
        return $url;
    }
    /*************************************************************
    * Size Helpers
    * functions to retreive setting information
    ************************************************************/

    /**
     * Atomicon::convertSettingBytes()
     * Convert a shorthand byte value from a PHP configuration directive to an integer value
     *
     * @param mixed $value
     * @return
     */
    function convertSettingBytes($value)
    {
        $result = false;
        if (is_numeric($value))
        {
            $result = $value;
        }
        else
        {
            $value_length = strlen($value);
            $qty = substr($value, 0, $value_length - 1);
            $unit = strtolower(substr($value, $value_length - 1));
            switch ($unit)
            {
                case 'k':
                    $qty *= 1024;
                    break;
                case 'm':
                    $qty *= 1048576;
                    break;
                case 'g':
                    $qty *= 1073741824;
                    break;
            }
            $result = $qty;
        }
        return $result;
    }
    
    function getByteSize($bytes)
    {
    	$size = $bytes / 1024;
    	if($size < 1024)
        {
        	$size = number_format($size, 2);
        	$size .= ' KB';
        }
    	else
        {
        	if($size / 1024 < 1024)
            {
            	$size = number_format($size / 1024, 2);
            	$size .= ' MB';
            }
        	else if ($size / 1024 / 1024 < 1024)
            {
            	$size = number_format($size / 1024 / 1024, 2);
            	$size .= ' GB';
            }
        }
    	return $size;
    }
    
    function getMaxUploadSize()
    {
        $post_size   = ini_get('post_max_size');
        $upload_size = ini_get('upload_max_filesize');
        return min( Atomicon::convertSettingBytes($post_size), Atomicon::convertSettingBytes($upload_size) );
    }
    /*************************************************************
    * File extension Helpers
    * functions to retreive file extension information
    ************************************************************/

    /**
     * Atomicon::getImageExtensions()
     *
     * @return array
     */
    function getImageExtensions()
    {
        return array("jpg", "jpeg", "gif", "bmp", "png");
    }
    /**
     * Atomicon::getArchiveExtensions()
     *
     * @return array
     */
    function getArchiveExtensions()
    {
        return array('zip', 'tar', 'tgz', 'gz', 'gzip', 'tbz2', 'bz2', 'bzip2');
    }
    /**
     * Atomicon::isArchive()
     *
     * @param mixed $filename
     * @return boolean
     */
    function isArchive($filename)
    {
        $ext = strtolower(JFile::getExt($filename));
        return in_array($ext, Atomicon::getArchiveExtensions());
    }
    /**
     * Atomicon::isImage()
     *
     * @param mixed $filename
     * @return boolean
     */
    function isImage($filename)
    {
        $ext = strtolower(JFile::getExt($filename));
        return in_array($ext, Atomicon::getImageExtensions());
    }

    /*************************************************************
    * Archive Helpers
    * functions to handle archives
    ************************************************************/

    /**
     * Atomicon::unzipUploadedFile()
     *
     * @param mixed $file
     * @param mixed $path
     * @return boolean
     */
    function unzipUploadedFile($file, $path)
    {
        $filename = $file['name'];
        if (Atomicon::isArchive($filename))
        {
            $ext = strtolower(JFile::getExt($filename));
            $archive = $file['tmp_name'] . '.' . $ext;
            if (rename($file['tmp_name'], $archive) !== false)
            {
                return Atomicon::unzipFile($archive, $path);
            }
        }
        return false;
    }

    /**
     * Atomicon::unzipFile()
     *
     * @param mixed $archive
     * @param mixed $path
     * @return
     */
    function unzipFile($archive, $path)
    {
        return JArchive::extract($archive, $path) === true;
    }


    /*************************************************************
    * HTML Helpers
    * functions to handle HTML
    ************************************************************/

    /**
     * Atomicon::startAdminForm()
     *
     * @param mixed $hidden
     * @param bool $multipart
     * @return
     */
    function startAdminForm($hidden = array(), $multipart = false)
    {
        if (!is_array($hidden))
        {
            $hidden = array();
        }
        $vars = array("task", "option", "controller");

        foreach ($vars as $var)
        {
            if (!array_key_exists($var, $hidden))
            {
                $hidden[$var] = JRequest::getVar($var, '');
            }
        }

        $tmpl = JRequest::getVar('tmpl', null);
        if (!empty($tmpl) && !isset($hidden['tmpl']))
        {
            $hidden['tmpl'] = $tmpl;
        }

        $html = '';
        $html .= '<form name="adminForm" method="post" ' . ($multipart ?
            'enctype="multipart/form-data"' : '') . '>' . PHP_EOL;

        foreach ($hidden as $key => $value)
        {
            $html .= '<input type="hidden" name="' . htmlspecialchars($key) . '" value="' .
                htmlspecialchars($value) . '">' . PHP_EOL;
        }
        return $html;
    }
    /**
     * Atomicon::endAdminForm()
     *
     * @return
     */
    function endAdminForm()
    {
        $html = '</form>' . PHP_EOL;
        return $html;
    }

    /**
     * Atomicon::addToolbarPopup()
     *
     * @param string $class
     * @param string $alt
     * @param string $url
     * @param integer $width
     * @param integer $height
     * @return
     */
    function addToolbarPopup($class = 'upload', $alt = "Upload", $url = 'index.php', $width = 550, $height = 400)
    {
        $bar = &JToolBar::getInstance('toolbar');
        $bar->appendButton('Popup', $class, $alt, $url, $width, $height);
    }

    /**
     * Atomicon::getModalLink()
     *
     * @param mixed $url
     * @param mixed $label
     * @param mixed $width
     * @param mixed $height
     * @return
     */
    function getModalLink($url, $label, $width = null, $height = null)
    {
        if (empty($width) || empty($height))
        {
            $rel = "{handler:'iframe',size:{x:window.getSize().scrollSize.x-80, y: window.getSize().size.y-80}, onShow:$('sbox-window').setStyles({'padding': 0})}";
        }
        else
        {
            $rel = "{handler: 'iframe', size: {x: $width, y: $height }}";
        }

        JHTML::_('behavior.modal');
        $html = '';
        $html .= '<a rel="' . $rel . '" href="' . $url . '" class="modal">';
        $html .= $label;
        $html .= '</a>';
        return $html;
    }


    /**
     * Atomicon::closeModalBox()
     *
     * @param bool $reload
     * @return
     */
    function closeModalBox($reload = true)
    {
        $html = '<script>' . PHP_EOL;
        $html .= 'window.parent.document.getElementById(\'sbox-window\').close();' .
            PHP_EOL;
        if ($reload)
        {
            $html .= 'window.parent.document.location.reload(true);' . PHP_EOL;
        }
        $html .= '</script>' . PHP_EOL;
        return $html;
    }

    /**
     * Atomicon::getModalControls()
     *
     * @param mixed $title
     * @param string $task
     * @param bool $refresh
     * @param bool $close_on_save
     * @return
     */
    function getModalControls($title = null, $task = 'save', $refresh = false, $close_on_save = true)
    {
        $html = '
        <div style="float: right;">
			<button onclick="submitbutton(\'' . $task . '\'); ' . ($close_on_save ?
            'window.top.setTimeout(\'window.parent.document.getElementById(\\\'sbox-window\\\').close(); ' .
            ($refresh ? 'window.parent.document.location.reload(true);' : '') . '\', 700);' :
            '') . '" type="button">
			    ' . JText::_('Save') . '
			</button>
			<button onclick="window.parent.document.getElementById(\'sbox-window\').close();" type="button">
				' . JText::_('Close') . '
			</button>
		</div>';
        if (!empty($title))
        {
            $html .= '<h2>' . $title . '</h2>';
        }
        return $html;
    }

    /*************************************************************
    * Component Helpers
    * general functions to retreive component information
    ************************************************************/

    /**
     * Atomicon::route()
     *
     * @param mixed $params
     * @return
     */
    function route($params = array())
    {
        if (!isset($params['option']))
        {
            $params['option'] = Atomicon::getComponentName();
        }

        $q = "";
        foreach ($params as $key => $value)
        {
            $q .= $q == "" ? "" : "&";
            $q .= htmlspecialchars($key) . '=' . htmlspecialchars($value);
        }
        return JRoute::_('index.php?' . $q);
    }
    /**
     * retreives the name of the current component
     * if given a name: it will check for 'com_XXX' (where XXX is the name)
     * on error it will return null
     */

    /**
     * Atomicon::getComponentName()
     *
     * @param mixed $name
     * @return
     */
    function getComponentName($name = null)
    {
        if (empty($name))
        {
            $name = JRequest::getVar('option', null);
        }
        if (empty($name))
        {
            return null;
        }
        if (strpos($name, "com_") === false)
        {
            $name = 'com_' . $name;
        }
        return $name;
    }

    /**
     * Retreives the parameters for the current component
     * on error it will return null
     */
    /**
     * Atomicon::getComponentParameters()
     *
     * @param mixed $name
     * @return
     */
    function getComponentParameters($name = null)
    {
        $name = Atomicon::getComponentName($name);
        return empty($name) ? null : JComponentHelper::getParams($name);
    }
    /**
     * Retreives the path of the current component
     * on error it will return null
     */
    /**
     * Atomicon::getComponentPath()
     *
     * @param mixed $name
     * @param bool $admin
     * @return string
     */
    function getComponentPath($name = null, $admin = false)
    {
        $name = Atomicon::getComponentName($name);
        $path = Atomicon::fixPath($admin ? JPATH_SITE : JPATH_ADMINISTRATOR);
        return empty($name) ? null : Atomicon::fixPath(JPATH_ROOT) . 'components' . DS . $name;
    }

    /**
     * Retreives the url of the current component
     * on error it will return null
     */
    /**
     * Atomicon::getComponentURL()
     *
     * @param mixed $name
     * @param bool $admin
     * @param bool $pathonly
     * @return string
     */
    function getComponentURL($name = null, $admin = false, $pathonly = false)
    {
        $name = Atomicon::getComponentName($name);
        $root = Atomicon::fixURL(JURI::root($pathonly));
        if ($admin)
        {
            $root .= 'administrator/';
        }
        return empty($name) ? null : $root . 'components/' . $name;
    }

    /*************************************************************
    * Plugin Helpers
    * general functions to retreive component information
    ************************************************************/

    /**
     * Atomicon::getPlugin()
     *
     * @param mixed $type
     * @param mixed $name
     * @return JPlugin or null
     */
    function getPlugin($type, $name)
    {
        $plugin = &JPluginHelper::getPlugin($type, $name);
        if (is_array($plugin) && count($plugin) == 0)
        {
            $plugin = null;
        }
        return $plugin;
    }

    /*************************************************************
    * Database/SQL Helpers
    * general functions to retreive database information
    ************************************************************/

    /**
     * Atomicon::importSQL()
     *
     * @param mixed $filename
     * @param mixed $errmsg
     * @return boolean
     */
    function importSQL($filename, &$errmsg)
    {
        $errmsg = "";
        $dbo = &JFactory::getDBO();
        $lines = file($filename);

        if (!$lines)
        {
            $errmsg = "cannot open file $filename";
            return false;
        }

        foreach ($lines as $query)
        {
            $query = trim($query);
            if ($query == "")
            {
                continue;
            }

            if (ereg('^--', $query))
            {
                continue;
            }

            $dbo->setQuery($query);
            if ($dbo->query() === false)
            {
                $errmsg .= htmlspecialchars($dbo->getErrorMsg()) . '<pre>' . htmlspecialchars($query) . '</pre>' . PHP_EOL;
            }
        }
        return true;
    }

    /**
     * Atomicon::exportSQL()
     *
     * @param mixed $tables
     * @param string $null
     * @return
     */
    function exportSQL($tables = array(), $null = "''")
    {
        $dbo = &JFactory::getDBO();
        $d = "";

        foreach ($tables as $table)
        {
            $dbo->setQuery("SELECT * FROM " . $table);
            if ($dbo->query() !== false)
            {
                $result = $dbo->loadRowList();
                foreach ($result as $cr)
                {
                    $d .= "INSERT INTO " . $table . " VALUES (";
                    for ($i = 0; $i < sizeof($cr); $i++)
                    {
                        if ($cr[$i] == '')
                        {
                            $d .= $null . ",";
                        }
                        else
                        {
                            $d .= $dbo->Quote($cr[$i]) . ',';
                        }
                    }
                    $d = substr($d, 0, strlen($d) - 1);
                    $d .= ");\n";
                }
            }
            $d .= "\n";
        }
        return ($d);
    }
}

?>