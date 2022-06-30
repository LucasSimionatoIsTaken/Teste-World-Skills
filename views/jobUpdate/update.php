<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model app\models\Jobs */
/* @var $user app\models\User */

$this->title = 'Job Update';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'job')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>