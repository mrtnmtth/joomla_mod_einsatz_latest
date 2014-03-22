<?php
defined('_JEXEC') or die('Restricted Access');

JHTML::_('stylesheet', 'reports.css', 'modules/mod_reports/assets/');

$moduleclass_sfx = $params->get( 'moduleclass_sfx' );


$db =& JFactory::getDBO();
$query = 'SELECT id, link 
FROM `#__menu` 
WHERE `link` LIKE "%index.php?option=com_reports2&view=home&hauptlink=1%" AND `published` =1';
$db->setQuery($query);
$menu = $db->loadObject();

$db =& JFactory::getDBO();
$query ='SELECT * FROM `#__reports_config` LIMIT 1';
$db->setQuery($query);
$config = $db->loadObject();


$baseUploadDir = !empty($config->imagepath) ? $config->imagepath : 'images'.DS.$option.DS.'gallery'; // Bilder-Verzeichniss


if ($count>count($frontReports))
    {$count=count($frontReports);}


   if ($display[umbruch] == '0')
   {echo '<table style="width:100%;" class="modReports" class="'.$moduleclass_sfx.'" nowrap="nowrap" >';}
   else {echo '<table style="width:100%;" class="modReports" class="'.$moduleclass_sfx.'" >';}


   
for($i=0; $i < $count; $i++)
   {
	   
// Funktion : Das erste Bild aus der Gallerie als Bild in der Übersicht
$db =& JFactory::getDBO();
$query = 'SELECT image FROM `#__reports_images` WHERE report_id='.$frontReports[$i]->id;
$db->setQuery($query);
$foto[] = $db->loadresult();


echo '<tr style="text-align:left;padding: 2px 5px;color:#'.$colortext.';">';


   
$frontReports[$i]->summary = (strlen($frontReports[$i]->summary) > $display[maxchar]) ? substr($frontReports[$i]->summary,0,strrpos(substr($frontReports[$i]->summary,0,$display[maxchar]+1),' ')) : $frontReports[$i]->summary;
 
    $curTime = strtotime($frontReports[$i]->date1);
 echo '<td style="text-align:left;padding: 2px 5px;color:#'.$colortext.';">';
   echo '<span style="font-weight:bold;">'.date('d.m.Y', $curTime).'</span>&nbsp;&nbsp;';
   
   
   if ($display[date1] == '1')
   echo 'um '.date('H:i', $curTime).' Uhr&nbsp;&nbsp;';
   
   if ($display[umbruch] == '1')
   echo '<br/>';
   
   

   if ($display[templatecolor] != '1')
   {if ($display[data1] == '1') {echo'<a style="color:#'.$coloralert.';text-decoration:none;" href="'.JRoute::_('index.php?option=com_reports2&Itemid='.$menu->id.'&view=show&id='.$frontReports[$i]->id).'"'; echo '<b>'.$frontReports[$i]->data1.'&nbsp;&nbsp;</b></a>';  if ($display[umbruch] == '1')   echo '<br/>';}}
   else {if ($display[data1] == '1') { echo'<a style="text-decoration:none;" href="'.JRoute::_('index.php?option=com_reports2&Itemid='.$menu->id.'&view=show&id='.$frontReports[$i]->id).'"'; echo '<b>'.$frontReports[$i]->data1.'&nbsp;&nbsp;</b></a>';  if ($display[umbruch] == '1')   echo '<br/>';}}
  
   
   if ($display[address] == '1')
   {echo 'in '.$frontReports[$i]->address.'&nbsp;&nbsp;';
   

   
   if ($display[umbruch] == '1')
   echo '<br/>';}
   
if ($display[summary] == '1')   
{ echo $frontReports[$i]->summary;}  

if ($readontext)   
{ echo '<a style="color:#'.$coloralert.';text-decoration:none;" href="'.JRoute::_('index.php?option=com_reports2&Itemid='.$menu->id.'&view=show&id='.$frontReports[$i]->id).'">&nbsp;'.$readontext.'</a>';}  


echo '<br/>';
echo '</td>';

if ($bild_float=='none')
{ echo '</tr><tr>';}

if ($bild=='1')
{
if ($foto[$i])
{
	
echo'<td><a href="'.JRoute::_('index.php?option=com_reports2&Itemid='.$menu->id.'&view=show&id='.$frontReports[$i]->id).'">'; 
echo '<img src="'.$baseUploadDir.'/'.$foto[$i].'" style="margin: 2px 2px 2px 2px; padding:2px 2px 2px 2x;height:auto;width:'.$bild_breite.'; float:'.$bild_float.'; border:'.$bild_border.';-moz-border-radius: 8px;-webkit-border-radius: 8px;.border-radius: 8px;" /></a></td>';
	
}
}

echo '</tr>';
echo '<tr style="border-bottom: #000000 1px dotted;"></tr>';


   }
   echo '</table>';

?>

