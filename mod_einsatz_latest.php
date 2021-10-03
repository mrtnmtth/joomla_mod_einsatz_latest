<?php
defined('_JEXEC') or die('Illegal Access');

/**
 * @var \Joomla\CMS\Table\Module $module
 * @var \Joomla\CMS\Object\CMSObject $params
 */

JLoader::register('ModEinsatzLatestHelper', __DIR__ . '/helper.php');

$moduleClassSfx = $params->get('moduleclass_sfx', '');

$count = (int) $params->get('count', 5);
$placeholderText = $params->get('menu_none', 'No Reports Found');

$menuLink = JComponentHelper::getParams('com_einsatzkomponente')->get('homelink');
$reports = modEinsatzLatestHelper::getReports($count);

foreach($reports as $report)
{
	$report->link = JRoute::_('index.php?option=com_einsatzkomponente&Itemid='.$menuLink.'&view=einsatzbericht&id='.$report->id);
}

// if reports are retrieved render layout, if not show message
if ($reports) {
    $doc = JFactory::getDocument();
    $doc->addStyleSheet(JURI::root() . 'modules/mod_einsatz_latest/css/mod_einsatz_latest.css');

    require(JModuleHelper::getLayoutPath($module->module));
} else {
    echo '<span class="label label-important">'.$placeholderText.'</span>';
}
