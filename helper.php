<?php
defined('_JEXEC') or die('Restricted Access');

class modReports2Helper
{
	function getReports($count)
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT * FROM `#__reports` WHERE published=1 ORDER BY date1 DESC LIMIT '.$count;

		$db->setQuery($query);
		$fpReports = $db->loadObjectList();
		//print_r ($fpReports);
		return $fpReports;
	}	
}
?>
