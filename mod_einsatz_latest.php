<?php
defined('_JEXEC') or die('Illegal Access');

/**
 * @var \Joomla\CMS\Table\Module $module
 * @var \Joomla\CMS\Object\CMSObject $params
 */

JLoader::register('ModEinsatzLatestHelper', __DIR__ . '/helper.php');

$moduleclass_sfx = $params->get('moduleclass_sfx', '');
$modulewidth = $params->get('modulewidth', '100%');

$count = $params->get('count', '5');
$menuNone = $params->get('menu_none', 'No Reports Found');
$maxchar = $params->get('maxchar', '250');
$readontext = $params->get('readontext', '');
$separator = $params->get('separator', '1');
$separatorcolor = $params->get('separatorcolor', '#333');

$bild = $params->get('bild', '1');
$bild_breite = $params->get('bild_breite', '1');
$bild_float = $params->get('bild_float', '1');

$display['einsatzart'] = $params->get('einsatzart', '1');
$display['address'] = $params->get('address', '0');
$display['date1'] = $params->get('date1', '1');
$display['summary'] = $params->get('summary', '1');
$display['desc'] = $params->get('desc', '0');
$display['maxchar'] = $params->get('maxchar', '1');

$menulink = JComponentHelper::getParams('com_einsatzkomponente')->get('homelink');
$frontReports = modEinsatzLatestHelper::getReports($count);
foreach($frontReports as $report)
{
	$report->desc = modEinsatzLatestHelper::trimDesc($report->desc, $maxchar);
	$report->link = JRoute::_('index.php?option=com_einsatzkomponente&Itemid='.$menulink.'&view=einsatzbericht&id='.$report->id);
}

// if reports are retrieved render layout, if not show message
if ($frontReports) {
    $doc = JFactory::getDocument();
    $doc->addStyleSheet(JURI::root() . 'modules/mod_einsatz_latest/css/mod_einsatz_latest.css');

    require(JModuleHelper::getLayoutPath($module->module));
}
else {
    echo '<span class="label label-important">'.$menuNone.'</span>';
}
