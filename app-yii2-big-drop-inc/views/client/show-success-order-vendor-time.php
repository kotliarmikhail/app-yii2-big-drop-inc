<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
?>
    <h1><?= Html::encode('You\'ve ordered time by this vendors:') ?></h1>
    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'username',
                'label' => 'Vendor name',
            ],
            [
                'attribute' => 'date',
                'label' => 'Reservation date',
                'format' =>  ['date', 'dd.MM.Y'],
            ],
            [
            'attribute' => 'price',
            'label' => 'Price/day',
            ]
        ],
    ]);

    ?>


