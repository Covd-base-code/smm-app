<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lista', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'nome',
            'sexo',
            'data_nascimento',
            'provincia',
            //'distrito',
            //'endereco',
            //'profissao',
            //'tipo_beneficiario',
            //'tipo_documento',
            //'numero_documento',
            //'requisicao',
            //'created_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
