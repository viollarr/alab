<?php
/*********** XML PARAMETERS AND VALUES ************/
$xml_item = "component";// component | template
$xml_file = "phocafavicon.xml";		
$xml_name = "PhocaFavicon";
$xml_creation_date = "02/10/2008";
$xml_author = "Jan Pavelka (www.phoca.cz)";
$xml_author_email = "info@phoca.cz";
$xml_author_url = "www.phoca.cz";
$xml_copyright = "Jan Pavelka";
$xml_license = "GNU/GPL";
$xml_version = "1.0.1";
$xml_description = "Phoca Favicon";
$xml_copy_file = 1;//Copy other files in to administration area (only for development), ./front, ./language, ./other

$xml_menu = array (0 => "Phoca Favicon", 1 => "option=com_phocafavicon", 2 => "components/com_phocafavicon/assets/images/icon-16-menu.png");
$xml_submenu[0] = array (0 => "Control Panel", 1 => "option=com_phocafavicon", 2 => "components/com_phocafavicon/assets/images/icon-16-control-panel.png");
$xml_submenu[1] = array (0 => "Create Favicon", 1 => "option=com_phocafavicon&view=phocafavicon", 2 => "components/com_phocafavicon/assets/images/icon-16-menu-favicon.png");
$xml_submenu[2] = array (0 => "Info", 1 => "option=com_phocafavicon&view=phocafaviconin", 2 => "components/com_phocafavicon/assets/images/icon-16-menu-info.png");

$xml_install_file = 'install.phocafavicon.php'; 
$xml_uninstall_file = 'uninstall.phocafavicon.php';
/*********** XML PARAMETERS AND VALUES ************/
?>