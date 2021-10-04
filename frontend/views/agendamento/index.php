<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agendamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agendamento-index">


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
            [
                'attribute' => 'sala',
                'value' => function ($model) {
                    return   $model->sala['nome'];
                },


            ],
            'created_at:date',
            // 'created_by',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => []
            ],
        ],
    ]); ?>


</div>