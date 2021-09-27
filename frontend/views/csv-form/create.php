<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CsvForm */

$this->title = 'Submeter Lista';
$this->params['breadcrumbs'][] = ['label' => 'Lista', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="csv-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>