<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>

<div>
    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'level')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
