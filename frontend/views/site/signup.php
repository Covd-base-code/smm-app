<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Registar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1 class="d-flex justify-content-center"><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-center">Por favor preencha os campos abaixo para registar:</p>

    <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'email') ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Submeter', ['class' => 'btn btn-danger', 'name' => 'signup-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>