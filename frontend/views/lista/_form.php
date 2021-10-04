<?php

use yii\bootstrap4\Html;
use yii\helpers\VarDumper;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Agendamento;
use frontend\controllers\AgendamentoController;
?>
<div class="lista-form">


    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <?php
    echo $form->errorSummary($model);
    ?>

    <?php $sizes = Agendamento::find()->Where(['created_by' => Yii::$app->user->id])->distinct()->orderBy('empresa ASC')->all();
    // VarDumper::dump($sizes);
    $temp = array();

    foreach ($sizes as $size) {

        $temp[$size['id']] = $size->empresa . " - " . $size->data_agendamento;
    }
    ?>
    <?= $form->field($model, 'requisicao')->dropdownList($temp) ?>
    <?= $form->field($model, 'lista')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Submeter', ['class' => 'btn btn-danger']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- form -->