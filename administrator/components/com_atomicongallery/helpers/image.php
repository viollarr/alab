<?php

/* MOS Intruder Alerts */
defined('_JEXEC') or die();

class imageHelper{

	/** @var object image manipulation lib, sepecific to library */
	var $_lib = null;
	
	function renderLibs($name = 'imagelib', $selected_value = null)
	{
	  $value = "";
	  $libs  = imageHelper::getLibs(true);
	  if(count($libs) > 1)
	  {
	    return JHTML::_('select.genericlist', $libs, 'imagelib', '', 'value', 'text', $selected_value );	    
	  }
	  else if (count($libs) == 1)
	  {
		$value = $libs[0]->value;
	  	return '<input type="hidden" name="' . $name . '" id="' . $name . '" value="' . $value . '">' . htmlspecialchars($value = $libs[0]->value) . PHP_EOL;
	  }
	  return '';
	}
  /*
    $libs = imageHelper::getLibs();
    echo JHTML::_('select.genericlist', $libs, 'imagelib', '', 'value', 'text', $this->params->get('imagelib') );
  */
	function getLibs($select_option = true)
	{
		$libs = array();
		$gds = imageHelper::_testGD();
		foreach ($gds as $key=>$val) {
			$libs[] = $select_option ? JHTML::_('select.option',$key, $val) : $val;
		}
		$im = imageHelper::_testImagemagick();
		foreach ($im as $key=>$val) {
			$libs[] = $select_option ? JHTML::_('select.option',$key, $val) : $val;
		}
		return $libs;
	}

	/**
	 * load in the correct image library
	 *
	 * @param string image lib to load
	 * @return object image lib
	 */
	function loadLib( $lib )
	{
		$class = "image" . $lib;
		if (class_exists( $class )) {
			return new $class();
		} else {
			return JError::raiseError( 500, "can't load class: $class" );
		}
	}

	function _testGD()
	{
		$gd = array();
		$GDfuncList = get_extension_funcs('gd');
		ob_start();
		@phpinfo(INFO_MODULES);
		$output=ob_get_contents();
		ob_end_clean();
		$matches[1]='';
		if (preg_match( "/GD Version[ \t]*(<[^>]+>[ \t]*)+([^<>]+)/s", $output, $matches )) {
			$gdversion = $matches[2];
		}
		if (function_exists('imagecreatetruecolor') && function_exists('imagecreatefromjpeg')) {
			$gd['gd2'] = "GD: " . $gdversion;
		} elseif (function_exists('imagecreatefromjpeg')) {
			$gd['gd1'] = "GD: " . $gdversion;
		}
		return $gd;
	}

	function _testImagemagick()
	{
		if (function_exists("NewMagickWand")) {
			$im["IM"] = "Magick wand";
		} else {
			$output = array();
			$status = null;
			@exec('convert -version', $output, $status);
			$im = array();
			if (!$status && is_array($output) && isset($output[0])) {
				if (preg_match( "/imagemagick[ \t]+([0-9\.]+)/i",$output[0],$matches ))
				$im["IM"] = $matches[0] ;
			}
			unset($output, $status);
		}
		return $im;
	}
}

class image{
	var $_thumbPath = null;

	/**@var object storage class file/amazons3 etc*/
	var $storage = null;

	/**
	 * set the filesystem storage manager
	 * @param object $storage
	 */

	function setStorage( &$storage )
	{
		$this->storage =& $storage;
	}

	function GetImgType( $filename )
	{
		$info = getimagesize( $filename );
		switch ($info[2]) {
			case 1:
				return "gif";
				break;
			case 2:
				return "jpg";
				break;
			case 3:
				return "png";
				break;
			default:
				return false;
		}
	}

	function resize( $maxWidth, $maxHeight, $origFile, $destFile )
	{
		echo "this should be overwritten in the library class";
	}
}

class imageGD extends image{

	/**
	 * resize an image to a specific width/height using standard php gd graphics lib
	 * @param int maximum image Width (px)
	 * @param int maximum image Height (px)
	 * @param string current images folder pathe (must have trailing end slash)
	 * @param string destination folder path for resized image (must have trailing end slash)
	 * @param string file name of the image to resize
	 * @param bol save the resized image
	 * @return object? image
	 *
	 */
	function resize( $maxWidth, $maxHeight, $origFile, $destFile )
	{
		/* check if the file exists*/
		if (!$this->storage->exists( $origFile )) {
			return JError::raiseError(500, "no file found for $origFile");
		}
		/* Load image*/
		$img = null;
		$ext = strtolower(end(explode('.', $origFile)));
		if ($ext == 'jpg' || $ext == 'jpeg') {
			$img = @imagecreatefromjpeg($origFile);
			$header = "image/jpeg";
		} else if ($ext == 'png') {
			$img = @imagecreatefrompng($origFile);
			$header = "image/png";
			/* Only if your version of GD includes GIF support*/
		} else if ($ext == 'gif') {
			if (function_exists( imagecreatefromgif )) {
				$img = @imagecreatefromgif( $origFile );
				$header = "image/gif";
			} else {
				return JError::raiseWarning(21,"imagecreate from gif not available");
			}
		}
		/* If an image was successfully loaded, test the image for size*/
		if ($img) {
			/* Get image size and scale ratio*/
			$width = imagesx($img);
			$height = imagesy($img);
			$scale = min( $maxWidth / $width, $maxHeight / $height );
			/* If the image is larger than the max shrink it*/
			if ($scale < 1) {
				$new_width = floor( $scale * $width );
				$new_height = floor( $scale * $height );
				/* Create a new temporary image*/
				$tmp_img = imagecreatetruecolor( $new_width, $new_height );
				/* Copy and resize old image into new image*/
				imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0,
				$new_width, $new_height, $width, $height );
				imagedestroy( $img );
				$img = $tmp_img;
			}
		}
		/* Create error image if necessary*/
		if (!$img) {
			return JError::raiseWarning( 21, "resize: no image created for $origFile, extension = $ext, destination = $destFile  ");
		}
		/* save the file */
		if ($header == "image/jpeg") {
			ob_start();
			imagejpeg( $img, "", 100 );
			$image = ob_get_contents();
			ob_end_clean();
			$this->storage->write( $destFile, $image );
			//imagejpeg($img, $destFile);
		} else {
			if ($header == "image/png") {
				//imagepng($img, $destFile);
				ob_start();
				imagepng( $img, "", 0 );
				$image = ob_get_contents();
				ob_end_clean();
				$this->storage->write( $destFile, $image );
			} else {
				/* imagegif($img);*/
				if (function_exists("imagegif")) {
					ob_start();
					imagegif( $img, "", 100 );
					$image = ob_get_contents();
					ob_end_clean();
					$this->storage->write( $destFile, $image );
				} else {
					/* try using imagemagick to convert gif to png:*/
					$image_file = imgkConvertImage( $image_file,$baseDir,$destDir, ".png" );
				}
			}
		}
		$this->_thumbPath = $destFile;
	}
}

class imageGD2 extends image{

	/**
	 * resize an image to a specific width/height using standard php gd graphics lib
	 * @param int maximum image Width (px)
	 * @param int maximum image Height (px)
	 * @param string current images folder pathe (must have trailing end slash)
	 * @param string destination folder path for resized image (must have trailing end slash)
	 * @param string file name of the image to resize
	 * @param bol save the resized image
	 * @return object? image
	 *
	 */
	function resize( $maxWidth, $maxHeight, $origFile, $destFile )
	{

		/* check if the file exists*/
		if (!$this->storage->exists( $origFile )) {
			return JError::raiseError(500, "no file found for $origFile");
		}

		/* Load image*/
		$img = null;
		$ext = $this->GetImgType( $origFile );
		if(!$ext){
			return;
		}
		ini_set( 'display_errors', true );
		$memory = ini_get('memory_limit');
		$intmemory = rtrim( $memory, 'M' );
		if ($intmemory < 50) {
			ini_set( 'memory_limit', '50M' );
		}
		if ($ext == 'jpg' || $ext == 'jpeg') {
			$img = imagecreatefromjpeg($origFile);
			$header = "image/jpeg";
		} else if ($ext == 'png') {
			$img = imagecreatefrompng($origFile);
			$header = "image/png";
			/* Only if your version of GD includes GIF support*/
		} else if ($ext == 'gif') {
			if (function_exists( 'imagecreatefromgif' )) {
				$img = imagecreatefromgif($origFile);
				$header = "image/gif";
			} else {
				JError::raiseWarning(21, "imagecreate from gif not available");
			}
		}
		/* If an image was successfully loaded, test the image for size*/
		if ($img) {
			/* Get image size and scale ratio*/
			$width = imagesx($img);
			$height = imagesy($img);

			$scale = min($maxWidth / $width, $maxHeight / $height);
			/* If the image is larger than the max shrink it*/
			if ($scale < 1) {
				$new_width = floor($scale * $width);
				$new_height = floor($scale * $height);
				/* Create a new temporary image*/
				$tmp_img = imagecreatetruecolor($new_width, $new_height);
				/* Copy and resize old image into new image*/
				imagecopyresampled($tmp_img, $img, 0, 0, 0, 0,
				$new_width, $new_height, $width, $height);
				imagedestroy($img);
				$img = $tmp_img;
			}

		}
		if (!$img) {
			JError::raiseWarning(21, "no image created for $origFile, extension = $ext , destination = $destFile ");
		}

		/* save the file
		 * wite them out to output buffer first so that we can use JFile to write them
		 to the server (potential using J ftp layer)  */
		if ($header == "image/jpeg") {

			ob_start();
			imagejpeg($img, "", 100);
			$image = ob_get_contents();
			ob_end_clean();
			$this->storage->write( $destFile, $image );
		} else {
			if ($header == "image/png") {
				ob_start();
				imagepng($img, "", 0);
				$image = ob_get_contents();
				ob_end_clean();
				$this->storage->write( $destFile, $image );
			} else {
				if (function_exists("imagegif")) {
					ob_start();
					imagegif($img, "", 100);
					$image = ob_get_contents();
					ob_end_clean();
					$this->storage->write( $destFile, $image );
				} else {
					/* try using imagemagick to convert gif to png:*/
					$image_file = imgkConvertImage( $image_file, $baseDir, $destDir, ".png" );
				}
			}
		}
		$this->_thumbPath = $destFile;
		ini_set('memory_limit', $memory);
	}
}

class imageIM extends image{

	var $imageMagickDir = '/usr/local/bin/';

	function imageIM(){

	}

	/**
	 * resize an image to a specific width/height using imagemagick
	 * you cant set the quality of the resized image
	 * @param int maximum image Width (px)
	 * @param int maximum image Height (px)
	 * @param string full path of image to resize
	 * @param string full file path to save resized image to
	 * @return string output from image magick command
	 */

	function resize($maxWidth, $maxHeight, $origFile, $destFile ){

		$ext = $this->GetImgType( $origFile );
		if (!$ext) {
			//false so not an image type so cant resize
			return;
		}
		ini_set( 'display_errors', true );
		//see if the imagick image lib is installed
		if (class_exists( 'Imagick' )) {

			$im = new Imagick();

			/* Read the image file */
			$im->readImage( $origFile );

			/* Thumbnail the image ( width 100, preserve dimensions ) */
			$im->thumbnailImage( $maxWidth, $maxHeight, true );

			/* Write the thumbail to disk */
			$im->writeImage( $destFile );

			/* Free resources associated to the Imagick object */
			$im->destroy();
		} else {
			$resource = NewMagickWand();

			if (!MagickReadImage( $resource, $origFile )) {
				echo "ERROR!";
				print_r(MagickGetException( $resource ));
			}else{
			}
			$resource = MagickTransformImage( $resource, '0x0', $maxWidth . 'x' . $maxWidth );
			$this->_thumbPath = $destFile;
			MagickWriteImage( $resource, $destFile );
		}
	}
}
?>