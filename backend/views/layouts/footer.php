<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
?>
<footer class="footer">
    <div class="container">
        <p class="pull-left mt-3">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <!-- <p class="pull-right"><?= Yii::powered() ?></p> -->
    </div>
</footer>