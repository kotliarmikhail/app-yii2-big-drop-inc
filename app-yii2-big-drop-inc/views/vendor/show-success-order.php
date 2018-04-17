<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;


$this->title = 'List of the success orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'title',
                'label' => 'Service name',
            ],
            [
                'attribute' => 'created_date',
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

</div>
