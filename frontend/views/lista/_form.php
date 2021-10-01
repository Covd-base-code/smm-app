<?php

use yii\bootstrap4\Html;
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


    <?= $form->field($model, 'requisicao')->dropdownList(ArrayHelper::map(Agendamento::find()->Where(['created_by' => Yii::$app->user->id])->distinct()->orderBy('empresa ASC')->asArray()->all(), 'id', 'empresa', 'data_agendamento'), ['prompt' => 'Selecione uma requisição', 'id' => 'request_id']) ?>
    <?= $form->field($model, 'lista')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Submeter', ['class' => 'btn btn-danger']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- form -->