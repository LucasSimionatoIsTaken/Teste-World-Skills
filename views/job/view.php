<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $job app\models\Jobs */
/* @var $user app\models\User */
/* @var $comps */
/* @var $levels app\models\Levels */

$this->title = 'Job';
$this->params['breadcrumbs'][] = $this->title;

$levels_ = [];
global $levels_;
foreach($levels as $level) {
    $levels_[$level->id] = $level->level;
}

?>

<h2 class='pt-4'><?= $job->job ?></h2>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($user, 'phone')->textInput(['maxlength' => true]) ?>

    <div><?php 
    foreach($comps as $comp){
        echo '<span>'.$conp->competence.'</span>';
        echo $form->field($user, 'phone')->dropDownList($levels_);
    }
    ?></div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>