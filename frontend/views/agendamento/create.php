<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Agendamento */

$this->title = 'Fazer Agendamento';
$this->params['breadcrumbs'][] = ['label' => 'Agendamentos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agendamento-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>