<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>


    <h1><?= Html::encode('Profile client\'s') ?></h1>

    <p>
        <?=

        Html::a('Update', ['update-profile', 'id' => $model->id], ['class' => 'btn btn-primary']);

       ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'city',
            'state',
        ],
    ]) ?>


