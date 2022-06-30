<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/* @var $jobs app\models\Jobs */

$jobsHtml = '';
global $jobsHtml;
foreach($jobs as $job_) {
    $jobsHtml = $jobsHtml.'<a href="index.php?r=jobupdate/view&id='.$job_->id.'">'.$job_->job.'</p>';
    global $jobsHtml;
}
?>

<?= $jobsHtml ?>