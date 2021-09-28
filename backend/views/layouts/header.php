<?php

use backend\assets\AppAsset;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Html;

AppAsset::register($this);

NavBar::begin([
    'brandLabel' => Yii::$app->name,
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-lg navbar-light bg-danger shadow-sm fixed-top']
]);

if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => 'Registar', 'url' => ['/site/signup']];
    $menuItems[] = ['label' => 'Entrar', 'url' => ['/site/login']];
} else {
    $menuItems[] = '<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';

    // $menuItems[] = [
    //     'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
    //     'url' => ['/site/logout'],
    //     'linkOptions' => ['data-method' => 'post']
    // ];
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav ml-auto'],
    'items' => $menuItems,
]);
NavBar::end();
