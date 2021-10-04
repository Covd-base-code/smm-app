<?php

use Yii as yii;
use yii\helpers\Html;
use common\models\Sala;
use common\models\Empresa;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Agendamentos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="agendamentos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'empresa')->dropdownList(ArrayHelper::map(Empresa::find()->andWhere(['created_by' => Yii::$app->user->id])->asArray()->all(), 'id', 'nome'), ['prompt' => 'Selecione uma empresa'])  ?>

    <?= $form->field($model, 'numero_salas')->input('number') ?>

    <?= $form->field($model, 'sala')->dropdownList(ArrayHelper::map(Sala::find()->andWhere(['estado' => 0])->distinct()->orderBy('nome ASC')->asArray()->all(), 'id', 'nome'), ['prompt' => 'Selecione uma sala']) ?>

    <?= $form->field($model, 'numero_pacientes')->input('number') ?>

    <?= $form->field($model, 'periodo')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>