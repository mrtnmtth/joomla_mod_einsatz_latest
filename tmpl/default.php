<?php
defined('_JEXEC') or die('Restricted Access');

/**
 * @var string $moduleClassSfx
 * @var array $reports
 */
?>

<div class="einsatz_latest<?php echo $moduleClassSfx; ?>">

<?php foreach ($reports as $report):

    $alertTime = strtotime($report->date1);
    $color = $report->marker ?: '#bbbbbb';
    $img = $report->thumb ?: $report->image; ?>

    <div class="card mb-3" style="max-width: 540px;" onclick="parent.location='<?= $report->link; ?>'">
        <div class="row g-0">
            <div class="col-md-4 alert-icon" style="background-color: <?= $color; ?>aa; background-image: url('<?= $report->list_icon; ?>');">
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
