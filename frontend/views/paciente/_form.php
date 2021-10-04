<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Agendamento;

/* @var $this yii\web\View */
/* @var $model common\models\Paciente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paciente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php
    echo $form->errorSummary($model);
    ?>

    <?php $sizes = Agendamento::find()->Where(['created_by' => Yii::$app->user->id])->distinct()->orderBy('empresa ASC')->all();
    $temp = array();

    foreach ($sizes as $size) {

        $temp[$size['id']] = $size->empresa . " - " . $size->data_agendamento;
    }
    ?>
    <?= $form->field($model, 'requisicao')->dropdownList($temp) ?>
    <?= $form->field($model, 'lista')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>