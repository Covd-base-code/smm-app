<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Sala */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sala-form">

    <?php $form = ActiveForm::begin(); ?>

    <p><?php echo $form->errorSummary($model) ?></p>
    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lotacao')->textInput() ?>

    <?= $form->field($model, 'localizacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->dropdownList($model->getStatusLabels()) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>