<?php
defined('_JEXEC') or die('Restricted Access');

$moduleclass_sfx = $params->get( 'moduleclass_sfx' );

echo '<style>
table.modReports {
	border-collapse: collapse;
	width:auto;
}
table.modReports th, table.modReports td {}
#link0 {
	color:#fff000 !important;
	text-decoration:none !important;
}
#link1 {
	color:#000000 !important;
	text-decoration:none !important;
}
#link2 {
	color:#ff0000 !important;
	text-decoration:none !important;
}
round img {
	border: none;
	-moz-border-radius: 8px;
	-webkit-border-radius: 8px;
	.border-radius: 8px;
}
</style>';

if ($count>count($frontReports))
	$count=count($frontReports);

echo '<table style="width:100%;" class="modReports" class="'.$moduleclass_sfx;
if ($display[umbruch] == '0')
	echo '" nowrap="nowrap"';
echo '>';

for($i=0; $i < $count; $i++)
{
	echo '<tr style="text-align:left;padding: 2px 5px;color:#'.$colortext.';">';

	$frontReports[$i]->summary =
		(strlen($frontReports[$i]->summary) > $display[maxchar]) ?
		substr($frontReports[$i]->summary,0,strrpos(substr
		($frontReports[$i]->summary,0,$display[maxchar]+1),' ')) :
		$frontReports[$i]->summary;
 
	$curTime = strtotime($frontReports[$i]->date1);
	echo '<td style="text-align:left;padding: 2px 5px;color:#'.$colortext.';">';
	echo '<span style="font-weight:bold;">'.date('d.m.Y', $curTime)
		.'</span>&nbsp;&nbsp;';

	if ($display[date1] == '1')
		echo 'um '.date('H:i', $curTime).' Uhr&nbsp;&nbsp;';

	if ($display[umbruch] == '1')
		echo '<br/>';

	if ($display[data1] == '1')
	{
		echo '<a style="';
		if ($display[templatecolor] != '1')
			echo 'color:#'.$coloralert.';';
		echo 'text-decoration:none;" href="'.$link[$i].'">';
		echo '<b>'.$frontReports[$i]->data1.'&nbsp;&nbsp;</b></a>';
		if ($display[umbruch] == '1')
			echo '<br/>';
	}

	if ($display[address] == '1')
	{
		echo 'in '.$frontReports[$i]->address.'&nbsp;&nbsp;';

		if ($display[umbruch] == '1')
			echo '<br/>';
	}
   
	if ($display[summary] == '1')
		echo $frontReports[$i]->summary;

	if ($readontext)
		echo '<a style="color:#'.$coloralert.';text-decoration:none;" href="'.$link[$i].'">&nbsp;'.$readontext.'</a>';

	echo '</td>';

	if ($bild_float=='none')
		echo '</tr><tr>';

	if (($bild=='1') and ($foto[$i]))
	{
		echo '<td><a href="'.$link[$i].'">';
		echo '<img src="'.$baseUploadDir.'/'.$foto[$i].'" style="margin: 2px 2px 2px 2px; padding:2px 2px 2px 2x;height:auto;width:'.$bild_breite.'; float:'.$bild_float.'; border:'.$bild_border.';-moz-border-radius: 8px;-webkit-border-radius: 8px;.border-radius: 8px;" /></a></td>';
	}

	echo '</tr><tr style="border-bottom: #000000 1px dotted;"></tr>';
}
echo '</table>';

?>
