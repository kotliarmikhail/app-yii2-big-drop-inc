<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VendorMetadata */
/* @var $form yii\widgets\ActiveForm */
?>

<div>
    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'sphere')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
