<?php
defined('_JEXEC') or die('Illegal Access');

/**
 * @var \Joomla\CMS\Table\Module $module
 * @var \Joomla\CMS\Object\CMSObject $params
 */

JLoader::register('ModEinsatzLatestHelper', __DIR__ . '/helper.php');

$moduleclass_sfx = $params->get('moduleclass_sfx', '');

$count = $params->get('count', '5');
$menuNone = $params->get('menu_none', 'No Reports Found');
$maxchar = $params->get('maxchar', '250');

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
