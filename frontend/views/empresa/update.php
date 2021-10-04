<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Empresa */

$this->title = 'Actualizar Empresa: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="empresa-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>