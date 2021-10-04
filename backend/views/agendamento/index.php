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
            //     'visibleButtons' => ['delete' => false, 'update' => false, 'view' => true],
            //     'visibleButtons' => [
            //         'view' => function ($model) {
            //             return $this->render('index', ['model' => $model]);
            //         },
            //     ]
            // ],
        ],
    ]) ?>

</div>