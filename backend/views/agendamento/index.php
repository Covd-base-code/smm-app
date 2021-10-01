<?php

use yii\bootstrap4\Html;
use kartik\icons\FontAwesomeAsset;
use phpDocumentor\Reflection\DocBlock\Tags\Reference\Url;

// FontAwesomeAsset::register($this);

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
            //     'contentOptions' => [],
            //     'header' => 'Actions',
            //     'template' => '{view}',
            //     'visibleButtons' => [
            //         'view' => function ($model) {
            //             return $this->render('index', ['/lista/index']);
            //         },
            //     ]
            // ],
        ],
    ]) ?>

</div>