<?php
defined('_JEXEC') or die('Restricted Access');

$moduleclass_sfx = $params->get( 'moduleclass_sfx' );

echo '<style>
table.modReports {
	border-collapse: collapse;
	width: 100%;
}
tr.modReports, td.modReports {
	text-align: left;
	padding: 2px 5px;
	color: #'.$colortext.';
}
tr.modReports_dotted {
	border-bottom: #000000 1px dotted;
}
td.modReports span {
	font-weight: bold;
}
td.modReports a {
	text-decoration: none;';
	
if ($display[templatecolor] != '1') echo 'color: #'.$coloralert.';';

echo '}
img.modReports {
	margin: 2px 2px 2px 2px;
	padding: 2px 2px 2px 2px;
	height: auto;
	width: '.$bild_breite.';
	float: '.$bild_float.';
	border: '.$bild_border.';
}
</style>';

if ($count>count($frontReports))
	$count=count($frontReports);

echo '<table class="modReports" class="'.$moduleclass_sfx;
if ($display[umbruch] == '0')
	echo '" nowrap="nowrap"';
echo '>';

for($i=0; $i < $count; $i++)
{
	echo '<tr class="modReports">';

	$frontReports[$i]->summary =
		(strlen($frontReports[$i]->summary) > $display[maxchar]) ?
		substr($frontReports[$i]->summary,0,strrpos(substr
		($frontReports[$i]->summary,0,$display[maxchar]+1),' ')) :
		$frontReports[$i]->summary;
 
	$curTime = strtotime($frontReports[$i]->date1);
	echo '<td class="modReports">';
	echo '<span>'.date('d.m.Y', $curTime).'</span>&nbsp;&nbsp;';

	if ($display[date1] == '1')
		echo 'um '.date('H:i', $curTime).' Uhr&nbsp;&nbsp;';

	if ($display[umbruch] == '1')
		echo '<br/>';

	if ($display[data1] == '1')
	{
		echo '<a href="'.$link[$i].'">';
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
		echo '<a href="'.$link[$i].'">&nbsp;'.$readontext.'</a>';

	echo '</td>';

	if ($bild_float=='none')
		echo '</tr><tr>';

	if (($bild=='1') and ($foto[$i]))
	{
		echo '<td><a href="'.$link[$i].'">';
		echo '<img class="modReports" src="'.$baseUploadDir.'/'.$foto[$i].'" /></a></td>';
	}

	echo '</tr><tr class="modReports_dotted"></tr>';
}
echo '</table>';

?>
