<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Paciente */

$this->title = 'Actualizar Lista: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pacientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="paciente-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>