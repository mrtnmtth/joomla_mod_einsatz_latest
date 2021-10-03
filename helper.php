<?php
defined('_JEXEC') or die('Restricted Access');

class ModEinsatzLatestHelper
{
	static function getReports(int $count): array
	{
		$db = JFactory::getDBO();
		$query = 'SELECT b.id, b.image, thumb, address, date1, summary, b.desc, title, a.marker, a.list_icon
			FROM (
				SELECT *
				FROM `#__eiko_einsatzberichte`
				WHERE state=1 ORDER BY date1 DESC LIMIT '.$count.'
			) AS b
			LEFT JOIN `#__eiko_einsatzarten` AS a ON (b.data1=a.id)
			LEFT JOIN `#__eiko_images` AS i ON (b.image=i.image)
			ORDER BY date1 DESC';
		$db->setQuery($query);

        return $db->loadObjectList();
	}
}
