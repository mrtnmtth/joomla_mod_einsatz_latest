<?php
defined('_JEXEC') or die('Restricted Access');

/**
 * @var string $moduleclass_sfx
 * @var array $frontReports
 */
?>

<div class="einsatz_latest<?php echo $moduleclass_sfx; ?>">
<?php foreach ($frontReports as $report) : ?>
	<?php
        $alertTime = strtotime($report->date1);
        $img = $report->thumb ?: $report->image;
    ?>

    <div class="card mb-3" style="max-width: 540px;" onclick="parent.location='<?= $report->link; ?>'">
        <div class="row g-0">
            <div class="col-md-4">
                <?php if ($img): ?>
                    <img src="<?= $img; ?>" class="img-fluid rounded-start">
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $report->summary; ?></h5>
                    <p class="card-text">
                        <?= $report->address; ?>
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                            <?= date('d.m.Y H:i', $alertTime); ?>
                        </small>
                    </p>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
