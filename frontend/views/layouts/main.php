<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAsset;
use yii\bootstrap4\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);

$this->beginContent('@frontend/views/layouts/base.php');
?>

<head>
  <link rel="shortcut icon" href="<?= Yii::$app->request->baseUrl ?>/img/logo.png" type="image/x-icon" />
</head>
<?php
if (Yii::$app->user->isGuest) { ?>
  <main role="main" class="d-flex flex-shrink-0">

    <div class="container">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
  </main>
<?php } else { ?>

  <main role="main" class="d-flex flex-shrink-0">
    <?php echo $this->render('sidebar') ?>
    <div class="container">
      <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
      ]) ?>
      <?= Alert::widget() ?>
      <?= $content ?>
    </div>
  </main>
<?php } ?>









<?php $this->endContent(); ?>