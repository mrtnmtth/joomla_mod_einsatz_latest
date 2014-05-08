<?php
defined('_JEXEC') or die('Restricted Access');
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

class modReports2TickerHelper
{
	static function getReports($count)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM `#__reports` WHERE published=1
			ORDER BY date1 DESC LIMIT '.$count;
		$db->setQuery($query);
		$fpReports = $db->loadObjectList();
		//print_r ($fpReports);
		return $fpReports;
	}

	static function getMenu()
	{
		//FIXME: This is a pretty shitty way to determine menu item id
		$db = JFactory::getDBO();
		$query = '
			SELECT id, link FROM `#__menu` WHERE `link`
			LIKE "%index.php?option=com_reports2&view=home&hauptlink=1%"
			AND `published` =1';
		$db->setQuery($query);
		return $db->loadObject();
	}

	static function getBaseUploadDir() // Bilder-Verzeichniss
	{
		$db = JFactory::getDBO();
		$query ='SELECT * FROM `#__reports_config` LIMIT 1';
		$db->setQuery($query);
		$config = $db->loadObject();
		$baseUploadDir = !empty($config->imagepath) ?
			$config->imagepath : 'images'.DS.'com_reports'.DS.'gallery';
		return $baseUploadDir;
	}

	// Funktion : Das erste Bild aus der Gallerie als Bild in der Übersicht
	static function getFoto($frontReports, $i)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT image FROM `#__reports_images` WHERE report_id='.$frontReports[$i]->id;
		$db->setQuery($query);
		return $db->loadresult();
	}

	static function trimDesc($desc, $max){
		// remove html
		$desc = strip_tags($desc);
		$desc = substr($desc, 0, strrpos(substr($desc, 0, $max+1), ' '));
		return $desc;
	}
}
?>
