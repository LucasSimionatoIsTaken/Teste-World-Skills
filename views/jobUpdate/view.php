<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\Jobs */
/* @var $users app\models\User */
/* @var $userComps */

$this->title = 'Job Update';
$this->params['breadcrumbs'][] = $this->title;

$usersHtml = '';
global $usersHtml;
foreach($users as $user) {
    global $usersHtml;
    $usersHtml = $usersHtml.'<p>'.$user->name.'<br>';
    $usersHtml = $usersHtml.$user->email.'<br>';
    $usersHtml = $usersHtml.$user->phone.'</p>';
}
?>

<h2><?= Html::encode($model->job) ?></h2>
<a href="index.php?r=jobupdate/update&id='<?= $model->id ?>'">Update</a>

<?= $usersHtml ?>