<?php
defined('_JEXEC') or die('Restricted Access');
?>

<style>
div.einsatz_latest {
	width: <?php echo $modulewidth; ?>;
}
div.einsatz_latest .media:hover {
	background-color: #E9F5FF;
	cursor: pointer;
}
hr.separator1 {
	border: 0;
	border-bottom: 1px dashed <?php echo $separatorcolor; ?>;
}
hr.separator2 {
	border: 0;
	border-bottom: 1px solid <?php echo $separatorcolor; ?>;
}
div.einsatz_latest img.media-object {
	width: <?php echo $bild_breite; ?>;
}
</style>

<div class="einsatz_latest<?php echo $moduleclass_sfx; ?>">
<?php foreach ($frontReports as $report) : ?>
	<?php $alerttime = strtotime($report->date1); ?>
	<div class="media" onclick="parent.location='<?php echo $report->link; ?>'">

	<?php if (($bild=='1') and ($report->image) and !(strpos($report->image,'nopic'))) : ?>
		<a class="pull-<?php echo $bild_float; ?>" href="<?php echo $report->link; ?>">
			<?php // Use thumb instead of image if available ?>
			<?php if ($report->thumb) : ?>
				<img class="media-object" src="<?php echo $report->thumb; ?>" />
			<?php else : ?>
				<img class="media-object" src="<?php echo $report->image; ?>" />
			<?php endif; ?>
		</a>
	<?php endif; ?>

	<div class="media-body">
	<strong><?php echo date('d.m.Y', $alerttime); ?></strong>

	<?php if ($display['date1']) : ?>
		<?php echo ' um '.date('H:i', $alerttime).' Uhr'; ?>
	<?php endif; ?>
	<br />

	<?php if ($display['address']) : ?>
		<?php echo $report->address; ?><br />
	<?php endif; ?>

	<?php if ($display['einsatzart']) : ?>
		<a href="<?php echo $report->link; ?>"><b><?php echo $report->title; ?></b></a><br />
	<?php endif; ?>

	<?php if ($display['summary']) : ?>
		<?php echo $report->summary; ?><br />
	<?php endif; ?>

	<?php if (($display['desc']) and ($report->desc)) : ?>
		<p>
			<?php echo $report->desc; ?><b>&hellip;</b>
			<?php if ($readontext) : ?>
				<a href="<?php echo $report->link ?>"><?php echo $readontext ?></a>
			<?php endif; ?>
		</p>
	<?php endif; ?>

	</div>
	</div>
	<?php if ($separator) : ?>
		<hr class="einsatz_latest separator<?php echo $separator; ?>">
	<?php endif; ?>
<?php endforeach; ?>
</div>
