<?php
defined('_JEXEC') or die('Restricted Access');
?>

<style>
div.reportsticker {
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$colortext.';'."\n"; ?>
	width: <?php echo $modulewidth; ?>;
}
div.reportsticker:hover {
	background-color: #F5F5FF;
	cursor: pointer;
}
hr.reportsticker {
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
hr.separator3 {
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left, rgba(0,0,0,0), <?php echo $separatorcolor; ?>, rgba(0,0,0,0));
	background-image:    -moz-linear-gradient(left, rgba(0,0,0,0), <?php echo $separatorcolor; ?>, rgba(0,0,0,0));
	background-image:     -ms-linear-gradient(left, rgba(0,0,0,0), <?php echo $separatorcolor; ?>, rgba(0,0,0,0));
	background-image:      -o-linear-gradient(left, rgba(0,0,0,0), <?php echo $separatorcolor; ?>, rgba(0,0,0,0));
}
div.reportsticker span {
	font-weight: bold;
}
div.reportsticker a {
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$coloralert.' !important;'."\n"; ?>
}
div.reportsticker p {
	margin: 0px 10px 0px 10px;
}
div.reportsticker img {
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
	echo '<div class="reportsticker'.$moduleclass_sfx.'" onclick="parent.location=\''.$link[$i].'\'">';

	if (($bild=='1') and ($thumb[$i]) and !(strpos($thumb[$i],'nopic')))
	{
		echo '<a href="'.$link[$i].'">';
		echo '<img src="'.$thumb[$i].'" />';
		echo '</a>';
	}
	
	echo '<p>';
	
	if ($display['umbruch'])
	{
		echo '<span>'.date('d.m.Y', $curTime).'</span>';
		if ($display['date1'])
			echo ' um '.date('H:i', $curTime).' Uhr';
		echo '<br />';
		if ($display['data1'])
			echo '<a href="'.$link[$i].'"><b>'.$frontReports[$i]->data1.'</b></a><br />';
		if ($display['address'])
			echo $frontReports[$i]->address.'<br />';
		if ($display['summary'])
			echo $frontReports[$i]->summary.'<br />';
		if (($display['desc']) and ($frontReports[$i]->desc))
			echo $frontReports[$i]->desc.' <b>...</b> ';
		if ($readontext)
			echo '<a href="'.$link[$i].'">'.$readontext.'</a>';
	}
	else
	{
		echo '<span>'.date('d.m.Y', $curTime).'</span>';
		if ($display['date1'])
			echo ' um '.date('H:i', $curTime).' Uhr';
		echo ', ';
		if ($display['data1'])
			echo '<a href="'.$link[$i].'"><b>'.$frontReports[$i]->data1.'</b></a> ';
		if ($display['address'])
			echo 'in '.$frontReports[$i]->address.'. ';
		if ($display['summary'])
			echo '| '.$frontReports[$i]->summary.' ';
		if (($display['desc']) and ($frontReports[$i]->desc))
			echo '| '.$frontReports[$i]->desc.' <b>...</b> ';
		if ($readontext)
			echo '<a href="'.$link[$i].'">'.$readontext.'</a>';
	}

	echo '</p></div>';
	echo '<hr class="reportsticker separator'.$separator.'">';
}

?>
