<?php
defined('_JEXEC') or die('Restricted Access');
?>

<style>
div.einsatz_latest {
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$colortext.';'."\n"; ?>
	width: <?php echo $modulewidth; ?>;
}
div.einsatz_latest:hover {
	background-color: #F5F5FF;
	cursor: pointer;
}
hr.einsatz_latest {
	color: transparent;
	clear: both;
}
hr.separator1 {
	border: 0;
	border-bottom: 1px dashed <?php echo $separatorcolor; ?>;
}
hr.separator2 {
	border: 0;
	border-bottom: 1px solid <?php echo $separatorcolor; ?>;
}
div.einsatz_latest span {
	font-weight: bold;
}
div.einsatz_latest a {
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$coloralert.' !important;'."\n"; ?>
}
div.einsatz_latest p {
	margin: 0px 10px 0px 10px;
}
div.einsatz_latest img {
	margin: 2px 10px 8px 10px;
	height: auto;
	width: <?php echo $bild_breite; ?>;
	float: <?php echo $bild_float; ?>;
}
</style>

<?php
if ($count>count($frontReports))
	$count=count($frontReports);

for($i=0; $i < $count; $i++)
{
	$curTime = strtotime($frontReports[$i]->date1);
	echo '<div class="einsatz_latest'.$moduleclass_sfx.'" onclick="parent.location=\''.$link[$i].'\'">';

	if (($bild=='1') and ($thumb[$i]) and !(strpos($thumb[$i],'nopic')))
	{
		echo '<a href="'.$link[$i].'">';
		echo '<img src="'.$thumb[$i].'" />';
		echo '</a>';
	}
	
	echo '<p>';

	echo '<span>'.date('d.m.Y', $curTime).'</span>';
	if ($display['date1'])
		echo ' um '.date('H:i', $curTime).' Uhr';
	echo '<br />';
	if ($display['einsatzart'])
		echo '<a href="'.$link[$i].'"><b>'.$frontReports[$i]->title.'</b></a><br />';
	if ($display['address'])
		echo $frontReports[$i]->address.'<br />';
	if ($display['summary'])
		echo $frontReports[$i]->summary.'<br />';
	if (($display['desc']) and ($frontReports[$i]->desc))
		echo $frontReports[$i]->desc.' <b>...</b> ';
	if ($readontext)
		echo '<a href="'.$link[$i].'">'.$readontext.'</a>';

	echo '</p></div>';
	echo '<hr class="einsatz_latest separator'.$separator.'">';
}

?>
