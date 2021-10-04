<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Agendamentos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="agendamentos-index">


    <p>
        <?= Html::a('Fazer Agendamentos', ['create'], ['class' => 'btn btn-danger']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'empresa',
            'numero_salas',
            'sala',
            'numero_pacientes',
            'periodo',
            //'created_by',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>