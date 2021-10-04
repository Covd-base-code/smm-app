<?php

use yii\helpers\Html;
use common\models\Sala;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Agendamento */
/* @var $form yii\widgets\ActiveForm */
/* @var $dataProvider frontend\controllers\salaController */
?>

<div class="agendamento-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

    <p><?php echo $form->errorSummary($model) ?></p>

    <?= $form->field($model, 'empresa')->textInput(['maxlength' => true]) ?>*

    <?= $form->field($model, 'endereco')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nuit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_agendamento')->Input('date') ?>

    <?= $form->field($model, 'sala')->dropdownList(ArrayHelper::map(Sala::find()->where(['estado' => 0])->distinct()->orderBy('nome ASC')->asArray()->all(), 'id', 'nome'), ['prompt' => 'Selecione uma sala']) ?>

    <div class="form-group">
        <?= Html::submitButton('Submeter', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>