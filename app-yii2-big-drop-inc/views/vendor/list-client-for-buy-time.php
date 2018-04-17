<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;


?>

<h1><?= Html::encode('List of those who want to buy time') ?></h1>
<?=

GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'username',
            'label' => 'Name of client',
        ],
        [
            'attribute' => 'date',
            'label' => 'Reservation date',
            'format' => ['date', 'dd.MM.Y'],
        ],
        [
            'attribute' => 'price',
            'label' => 'Price/day',
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => Helper::filterActionColumn(['activate', 'deactivate']),
            'buttons' => [
                'activate' => function ($url, $dataProvider) {
                    if ($dataProvider['vendor_confirm'] == 1) {

                        return '';
                    }
                    $options = [
                        'title' => 'Activate',
                        'aria-label' => 'Activate',
                        'data-confirm' => 'Are you sure you want to activate this client?',
                        'data-method' => 'post',
                    ];

                    return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['vendor/activate-vendor-time', 'id' => $dataProvider['id']], $options);

                },
                'deactivate' => function ($url, $dataProvider) {
                    if ($dataProvider['vendor_confirm'] == 0) {
                        return '';
                    }
                    $options = [
                        'title' => 'Deactivate',
                        'aria-label' => 'Deactivate',
                        'data-confirm' => 'Are you sure you want to deactivate this client?',
                        'data-method' => 'post',
                    ];
                    return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['vendor/deactivate-vendor-time', 'id' => $dataProvider['id']], $options);
                }
            ]

        ],
    ],
]);


?>

</div>
