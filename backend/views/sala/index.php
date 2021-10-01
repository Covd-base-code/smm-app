<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Salas Disponiveis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sala-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Sala', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'nome',
            'lotacao',
            'localizacao',
            [
                'attribute' => 'estado',
                'content' => function ($model) {
                    return $model->getStatusLabels()[$model->estado];
                }
            ],

            //'created_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>