<?php
defined('_JEXEC') or die('Restricted Access');
if(!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

jimport('joomla.image.image');

class modEinsatzLatestHelper
{
	static function getReports($count)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM `#__eiko_einsatzberichte` WHERE state=1
			ORDER BY date1 DESC LIMIT '.$count;
		$db->setQuery($query);
		$fpReports = $db->loadObjectList();
		//print_r ($fpReports);
		return $fpReports;
	}

	static function trimDesc($desc, $max){
		// remove html
		$desc = strip_tags($desc);
		$desc = substr($desc, 0, strrpos(substr($desc, 0, $max+1), ' '));
		return $desc;
	}
}
?>
