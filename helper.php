<?php
defined('_JEXEC') or die('Restricted Access');

class ModEinsatzLatestHelper
{
	static function getReports($count)
	{
		$db = JFactory::getDBO();
		$query = 'SELECT b.id, b.image, thumb, address, date1, summary, b.desc, title
			FROM (
				SELECT *
				FROM `#__eiko_einsatzberichte`
				WHERE state=1 ORDER BY date1 DESC LIMIT '.$count.'
			) AS b
			LEFT JOIN `#__eiko_einsatzarten` AS a ON (b.data1=a.id)
			LEFT JOIN `#__eiko_images` AS i ON (b.image=i.image)
			ORDER BY date1 DESC';
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
