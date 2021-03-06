<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agendamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agendamento-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Fazer Agendamento', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>

    <!-- <p class="mr-auto">
        <?= Html::a('Submeter lista', ['create'], ['class' => 'btn btn-danger']) ?>
    </p> -->


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'data_agendamento',
            'empresa',
            'endereco',
            'nuit',
            'contacto',
            'created_at:date',
            // 'created_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => []
            ],
        ],
    ]); ?>


</div>