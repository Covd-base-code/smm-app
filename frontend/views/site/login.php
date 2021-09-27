<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Entrar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1 class="d-flex justify-content-center"><?= Html::encode($this->title) ?></h1>

    <p class="d-flex justify-content-center">Por favor preencha os campos abaixo para entrar:</p>

    <div class="row d-flex justify-content-center">
        <div class="col-lg-5 d-flex justify-content-center">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div style="color:#999;margin:1em 0">
                Esqueceu a senha? <?= Html::a('Recuperar', ['site/request-password-reset']) ?>.
                <br>
                Não recebeu email de verificação? <?= Html::a('Reenviar', ['site/resend-verification-email']) ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Entrar', ['class' => 'btn btn-danger', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>