<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Agendamento */

$this->title = 'Fazer Agendamento';
$this->params['breadcrumbs'][] = ['label' => 'Agendamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agendamento-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>