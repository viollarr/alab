<?php

class AtomiconGallery
{
  function getBasePath()
  {
    $path = Atomicon::fixPath(JPATH_ROOT).'images'.DS.'atomicongallery';
    JFolder::create($path, 0777);
    return Atomicon::fixPath($path);
  }
  
  function getBaseURL()
  {
    $url = Atomicon::fixURL(JURI::root()).'images'.DS.'atomicongallery';
    return Atomicon::fixURL($url);
  }
  
  function getIgnoreFolders()
  {
	return array('.svn', 'CVS', "_thumbnails", "_descriptions");
  }
  
  function getFolderLink($folder = '', $component = false)
  {
	$tmpl = JRequest::getVar('tmpl', null);
	$url  = 'index.php?option=com_atomicongallery';
	$url .= ($folder!='' ? '&folder=' . $folder : '');
	$url .= ($component || $tmpl=='component' ? '&tmpl=component' : '');

	return JRoute::_($url , false);
  }
  
  function getGallery($folder = '')
  {
	$folder   = (strpos($folder, '.')===false) ? $folder : '';

    $basepath = AtomiconGallery::getBasePath();
    $baseurl  = AtomiconGallery::getBaseURL();
    $baserel  = trim(str_replace('\\','/',$folder), '/');

    $path     = Atomicon::fixPath($basepath . $folder);
    $url      = Atomicon::fixURL($baseurl . $folder);
    
    $filter   = Atomicon::fileFilter( "jpg|jpeg|gif|bmp|png" );
        
    $folders  = JFolder::folders($path, ".", false, false, AtomiconGallery::getIgnoreFolders());
    $files    = JFolder::files($path, $filter, false, false, array('.svn', 'CVS', "_thumbnails", "_descriptions"));
            
    $gallery  = array("folders" => array(), "files" => array() );

	if ($folder!='')
    {
		$folder_up = explode('/', $folder);
		unset($folder_up[count($folder_up)-1]);
		$folder_up = implode('/', $folder_up);

        $item = array();

		$item['path']       = Atomicon::fixPath($path);
		$item['url']        = Atomicon::fixURL ($url);

		$item['title']       = JText::_('Back');
		$item['folder']      = $folder_up;
		$item['up']          = true;
		$item['thumbnail']   = '';
        $item['description'] = '';

		$gallery['folders'][] = $item;
    }
	
	if (!is_array($folders))
	{
			echo JText::_('Warning! /images/atomicongallery does not exist or is not writeable');
			$folders = array();
	}	

	foreach($folders as $value)
	{
		$item = array();

		$item['path']        = Atomicon::fixPath($path . $value);
		$item['url']         = Atomicon::fixURL ($url  . urlencode($value));

		$item['title']       = $value;
		$item['folder']      = $baserel != '' ? $baserel.'/'.$value : $value;
		$item['up']          = false;
		$item['thumbnail']   = AtomiconGallery::getFolderThumbnail($item['folder']);
		$item['description'] = AtomiconGallery::getFolderDescription($item['folder']);

		$gallery['folders'][] = $item;
	}
	
	$files = is_array($files) ? $files : array();
	
	foreach($files as $value)
	{
		$item = array();
		$item['path']       = Atomicon::fixPath($path) . $value;
		$item['url']        = Atomicon::fixURL ($url)  . urlencode($value);

		$item['title']       = $value;
		$item['folder']      = $folder;
		$item['thumbnail']   = AtomiconGallery::getFileThumbnail($item['title'], $item['folder'] );
		$item['description'] = AtomiconGallery::getFileDescription($item['title'], $item['folder']);

		$gallery['files'][] = $item;
	}
	

    return $gallery;                
  }
  
  function getFolderThumbnail($folder)
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder);
    
	$image  = '';
    $filter = Atomicon::fileFilter( "jpg|jpeg|gif|bmp|png" );
   	$files  = JFolder::files($path, $filter, false, false, array('.svn', 'CVS', "_thumbnails", "_descriptions"));
   	
	foreach($files as $file)
	{
		$image = AtomiconGallery::getFileThumbnail($file, $folder);
		break;
	}
	if ($image == '') {
		$image = Atomicon::fixURL(Atomicon::getComponentURL(null, false)) . 'assets/images/noimage.gif';
	}
	return $image;
  }
  
  function saveDescriptions($folder, $descriptions)
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder) . '_descriptions';
    JFolder::create($path, 0777);
    $path .= DS;
    foreach($descriptions as $filename=>$description)
    {
		$filepath = $path . $filename . '.txt';
		@unlink($filepath);
		if ($description!='')
		{
			echo "Writing to $filepath : $description<br>";
			@JFile::write($filepath, $description);
		}
	}
  }
  
  function getFolderDescription($folder)
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder);
    
	$result = '';
	$path   = Atomicon::fixPath($path) . '_descriptions' . DS . '_folder.txt';
	if (JFile::exists($path)) {
		$result = @trim(file_get_contents($path));
	}
	return $result;
  }
  
  function getFileThumbnail($name, $folder)
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder);
    $url      = Atomicon::fixURL(AtomiconGallery::getBaseURL() . $folder);

	if (JFile::exists($path.'_thumbnails'.DS.$name))
	{
        $image = $url . '_thumbnails/' . $name;
	}
	else
	{
        $image = $url . $name;
	}
	return $image;
  }
  
  function getFileDescription($name, $folder)
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder);
    
	$result = '';
	$path = $path.'_descriptions'.DS.$name.'.txt';
	
	if (JFile::exists($path))
	{
		$result = @trim(file_get_contents($path));
	}
	return $result;
  }
  
  function addPathway($folder = '', $folder_param = '')
  {
	global $mainframe;
	$pathway = &$mainframe->getPathway();

	if (!empty($pathway))
	{
		$folders = explode("/", $this->folder);
		$folder  = '';
		foreach($folders as $foldername) {
			if ($folder!='') {
				$folder.='/';
			}
			$folder .= $foldername;
			
			if ($folder_param!='')
			{
				if (strpos($folder_param, $folder)!==false)
				{
					continue;
				}
			}
			
			if ($foldername!='') {
				$pathway->addItem($foldername, JRoute::_('index.php?option=com_atomicongallery&folder=' . $folder));
			}
		}
	}
  }
  
  function addFolder($name, $folder = '')
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder);
    return JFolder::create($path . $name, 0777);
  }
  
  function remove($name, $folder = '')
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder);
    if (is_dir($path. $name)) {
		$result = JFolder::delete($path . $name);
    } else {
		$result = JFile::delete($path . $name);
		//remove thumbnail (silent)
		@unlink($path.DS.'_thumbnails'.DS.$name);
		//remove description (silent)
		@unlink($path.DS.'_descriptions'.DS.$name.'.txt');
    }
    return $result;
  }
  
  function processImage($folder, $file, $width, $height, $lib, $skip_if_exists = true, $thumbnail = true)
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder) . $file;
	$name     = $file;
	$dirname  = Atomicon::fixPath( dirname($path) );
	
	if ($thumbnail)
	{
		$dirname .= '_thumbnails';
		JFolder::create($dirname, 0777);
		$dirname .= DS;
	}
	$newpath = $dirname . $name;
	
	if ($thumbnail)
    {
		if ($skip_if_exists && file_exists($newpath))
		{
			//it exists...skip
			return;
		}
	}
	else
	{
		$info   = getimagesize($path);
		$image_width  = $info[0];
		$image_height = $info[1];
		if ($image_width < $width &&
		    $image_height < $height )
	    {
			//no resize needed
			return;
		}
	}
	$storage  = new JFile;
	$imagelib = imageHelper::loadLib($lib);
	$imagelib->setStorage($storage);
	$imagelib->resize($width, $height, $path, $newpath);
	
  }
  
  function upload($folder = '')
  {
    $basepath = AtomiconGallery::getBasePath();
    $path     = Atomicon::fixPath($basepath . $folder);
    $count    = 0;
    
	if (isset($_FILES ) && is_array($_FILES))
	{
		foreach($_FILES as $file)
		{
			if (Atomicon::isArchive($file['name']))
			{
				$filter  = Atomicon::fileFilter( "jpg|jpeg|gif|bmp|png" );;
				$tempdir = Atomicon::fixPath(JPATH_ROOT).'tmp'.DS.time();
				if (Atomicon::unzipUploadedFile($file, $tempdir))
				{
					$files = JFolder::files($tempdir, $filter, true, true, AtomiconGallery::getIgnoreFolders());
					foreach($files as $file)
					{
						$newfile = Atomicon::fixPath($path) . JFile::getName($file);
						if (@copy($file, $newfile))
						{
							$count++;
						}
					}
					JFolder::delete($tempdir);
				}
			}
			else if(Atomicon::isImage($file['name']))
			{
                $newfile = $path . $file['name'];
				if (move_uploaded_file($file['tmp_name'], $newfile))
				{
					$count++;
				}
			}
		}
	}
	return $count;
  }
  
  function cssImage($url)
  {
	return str_replace('\'', '\\\'', $url);
  }
}

?>