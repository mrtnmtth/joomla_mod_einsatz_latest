<?php
defined('_JEXEC') or die('Restricted Access');

class modReports2Helper
{
	function getReports($count)
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT * FROM `#__reports` WHERE published=1
			ORDER BY date1 DESC LIMIT '.$count;
		$db->setQuery($query);
		$fpReports = $db->loadObjectList();
		//print_r ($fpReports);
		return $fpReports;
	}
	
	function getMenu()
	{
		//FIXME: This is a pretty shitty way to determine menu item id
		$db =& JFactory::getDBO();
		$query = '
			SELECT id, link FROM `#__menu` WHERE `link`
			LIKE "%index.php?option=com_reports2&view=home&hauptlink=1%"
			AND `published` =1';
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	function getBaseUploadDir() // Bilder-Verzeichniss
	{
		$db =& JFactory::getDBO();
		$query ='SELECT * FROM `#__reports_config` LIMIT 1';
		$db->setQuery($query);
		$config = $db->loadObject();
		$baseUploadDir = !empty($config->imagepath) ?
			$config->imagepath : 'images'.DS.'com_reports'.DS.'gallery';
		return $baseUploadDir;
	}
}
?>
