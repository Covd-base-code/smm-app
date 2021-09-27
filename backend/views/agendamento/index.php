<?php

use yii\bootstrap4\Html;


/** @var $dataProvider \use yii\data\ActiveDataProvider;*/

$this->title = 'Agendamentos Disponiveis';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="sala-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo \yii\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'empresa',
            'data_agendamento',
            'endereco',
            'nuit',
            'contacto',
            'created_at:date',
            // [
            //     'class' => 'yii\grid\ActionColumn',
            //     'template' => '{detalhes}',
            //     'buttons' => [
            //         'detalhes' => function ($url, $model) {
            //             return Html::a('<span class="glyphicon glyphicon-plus"></span>', $url, [

            //                 'title' => Yii::t('yii', 'Create'),
            //             ]);
            //         }
            //     ]
            // ],
        ],
    ]) ?>

</div>