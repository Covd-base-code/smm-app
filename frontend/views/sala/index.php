<?php

use yii\bootstrap4\Html;


/** @var $dataProvider \use yii\data\ActiveDataProvider;*/

$this->title = 'Salas Disponiveis';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sala-index">
    <?php echo \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        // 'itemView' => 'free_room'
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nome',
            'lotacao',
            'localizacao',
            [
                'attribute' => 'estado',
                'content' => function ($model) {
                    return $model->getStatusLabels()[$model->estado];
                }
            ],
            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'buttons' => ['requisitar']
            // ],
        ],
    ]) ?>

</div>