<?php
defined('_JEXEC') or die('Restricted Access');
?>

<style>
table.modReports2Ticker {
	border-collapse: collapse;
	width: 100%;
}
div.modReports2Ticker {
	text-align: left;
	padding: 2px 5px 5px;
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$colortext.';'; ?>
}
hr.modReports2Ticker {
	color: transparent;
	clear: both;
}
hr.separator1 {
	border: 0;
	border-bottom: 1px dashed <?php echo '.$separatorcolor.'; ?>
}
hr.separator2 {
	border: 0;
	border-bottom: 1px solid <?php echo '.$separatorcolor.'; ?>
}
hr.separator3 {
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), <?php echo '.$separatorcolor.'; ?>, rgba(0,0,0,0));
	background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), <?php echo '.$separatorcolor.'; ?>, rgba(0,0,0,0));
	background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), <?php echo '.$separatorcolor.'; ?>, rgba(0,0,0,0));
	background-image:      -o-linear-gradient(left, rgba(0,0,0,0), <?php echo '.$separatorcolor.'; ?>, rgba(0,0,0,0));
}
modReports2Ticker span {
	font-weight: bold;
}
modReports2Ticker a {
	text-decoration: none;';
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$coloralert.';'; ?>
}
img.modReports2Ticker {
	margin: 2px 10px 2px 10px;
	height: auto;
	width: <?php echo '.$bild_breite.'; ?>
	float: <?php echo '.$bild_float.'; ?>
}
</style>

<?php
if ($count>count($frontReports))
	$count=count($frontReports);

for($i=0; $i < $count; $i++)
{
	$curTime = strtotime($frontReports[$i]->date1);
	echo '<div class="modReports2Ticker '.$moduleclass_sfx.'">';

	if (($bild=='1') and ($foto[$i]))
	{
		echo '<a href="'.$link[$i].'">';
		echo '<img class="modReports2Ticker" src="'.$baseUploadDir.'/'.$foto[$i].'" />';
		echo '</a>';
	}
	echo '<p><span>'.date('d.m.Y', $curTime).'</span>&nbsp;&nbsp;';

	if ($display['date1'] == '1')
		echo 'um '.date('H:i', $curTime).' Uhr&nbsp;&nbsp;';

	if ($display['umbruch'] == '1')
		echo '<br/>';

	if ($display['data1'] == '1')
	{
		echo '<a href="'.$link[$i].'">';
		echo '<b>'.$frontReports[$i]->data1.'</b></a>&nbsp;&nbsp;';
		if ($display['umbruch'] == '1')
			echo '<br/>';
	}

	if ($display['address'] == '1')
	{
		echo 'in '.$frontReports[$i]->address.'&nbsp;&nbsp;';
		if ($display['umbruch'] == '1')
			echo '<br/>';
	}
   
	if ($display['summary'] == '1')
	{
		echo $frontReports[$i]->summary.'&nbsp;&nbsp;';
		if ($display['umbruch'] == '1')
			echo '<br/>';
	}

	if ($display['desc'] == '1')
		echo $frontReports[$i]->desc.'&nbsp;';

	if ($readontext)
		echo '<a href="'.$link[$i].'">'.$readontext.'</a>';

	echo '</p></div>';
	echo '<hr class="modReports2Ticker separator'.$separator.'">';
}

?>
