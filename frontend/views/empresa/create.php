<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Empresa */

$this->title = 'Criar Empresa';
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>