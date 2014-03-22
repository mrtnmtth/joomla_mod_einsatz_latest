<?php

defined('_JEXEC') or die('Illegal Access');

require_once(dirname(__FILE__).DS.'helper.php');

$moduleclass_sfx = $params->get('moduleclass_sfx', '');

$colortext = $params->get('color_text', 'cccccc');
$coloralert = $params->get('color_alert', 'ff0000');
$colorlink = $params->get('colorlink', 'ff0000');
$count = $params->get('count', '5');
$menuNone = $params->get('menu_none', 'No Reports Found');
$selected = $params->get('selected', '1');
$allselected = $params->get('allselected', '1');
$readontext = $params->get('readontext', '');

$bild = $params->get('bild', '1');
$bild_breite = $params->get('bild_breite', '1');
$bild_float = $params->get('bild_float', '1');
$bild_border = $params->get('bild_border', '1');

$display['data1'] = $params->get('data1', '1');
$display['address'] = $params->get('address', '0');
$display['summary'] = $params->get('summary', '1');
$display['boss'] = $params->get('boss', '0');
$display['tabelle'] = $params->get('tabelle', '1');
$display['maxchar'] = $params->get('maxchar', '1');
$display['umbruch'] = $params->get('umbruch', '0');
$display['templatecolor'] = $params->get('templatecolor', '1');
$title['data1'] = 'Einsatzart';
$title['address'] = 'Adresse';
$title['date1'] = 'Alarmierung um';
$title['date2'] = 'Ausfahrt um';
$title['date3'] = 'Einsatzbereitschaft hergestellt';
$title['summary'] = 'Kurzbeschreibung';
$title['boss'] = 'Einsatzleiter';
$title['people'] = 'Mannschaft';


$frontReports = modReports2Helper::getReports($count);
$menu = modReports2Helper::getMenu();
$baseUploadDir = modReports2Helper::getBaseUploadDir();
for($i=0; $i < $count; $i++)
	$foto[$i] = modReports2Helper::getFoto($frontReports, $i);

require(JModuleHelper::getLayoutPath($module->module));

?>
