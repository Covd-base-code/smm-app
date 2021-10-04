<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Agendamento */

$this->title = 'Actualizar Agendamento ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Agendamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="agendamento-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>