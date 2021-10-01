<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Lista */

$this->title = 'Submeter Lista';
$this->params['breadcrumbs'][] = ['label' => 'Listas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lista-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>