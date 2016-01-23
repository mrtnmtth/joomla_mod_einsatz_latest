<?php
defined('_JEXEC') or die('Restricted Access');

class modEinsatzLatestHelper
{
	static function getReports($count)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT b.id, image, address, date1, summary, b.desc, title
			FROM `#__eiko_einsatzberichte` AS b
			JOIN `#__eiko_einsatzarten` AS a ON (b.data1=a.id)
			WHERE b.state=1 ORDER BY date1 DESC LIMIT '.$count;
		$db->setQuery($query);
		$fpReports = $db->loadObjectList();
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
