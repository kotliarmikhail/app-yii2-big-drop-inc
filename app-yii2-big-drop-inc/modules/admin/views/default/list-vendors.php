<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;


/* @var $this yii\web\View */
/* @var $searchModel app\models\serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="service-index">


    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,


        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'vendor_id',
            'username',
            'level',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['update']),
                'buttons' => [
                    'update' => function ($url, $dataProvider) {
                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ['update-level', 'id' => $dataProvider['vendor_id']]);
                    }

                ]

            ],
        ],
    ]);

    ?>

</div>
