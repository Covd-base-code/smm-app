<?php

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;
?>
<div class="form">


    <?php $form = ActiveForm::begin(
        [
            'options' => [
                'enctype' => 'multipart/form-data',
                'id' => 'csv-form', 'enableAjaxValidation' => false
            ]
        ]
    ); ?>

    <?php
    //echo $form->errorSummary($model); 
    ?>

    <div class="row">
        <?php echo $form->field($model, 'csvfile'); ?>
        <?php
        $this->widget('CMultiFileUpload', array(
            'model' => $model,
            'name' => 'csvfile',
            'max' => 1,
            'accept' => 'csv',
            'duplicate' => 'Duplicate file!',
            'denied' => 'Invalid file type',
        ));
        ?>
        <?php echo $form->error($model, 'csvfile'); ?>
    </div>

    <div class="row buttons">
        <?php echo Html::submitButton('Import', array("id" => "Import", 'name' => 'Import')); ?>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- form -->