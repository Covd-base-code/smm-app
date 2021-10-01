<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CsvForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="csv-form-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <p><?php echo $form->errorSummary($model) ?></p>


    <?= $form->field($model, 'requisicao')->textInput() ?>
    <?= $form->field($model, 'file')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>