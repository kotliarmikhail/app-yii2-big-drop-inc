<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="service-index">

    <h1><?= Html::encode($this->title ="You can buy vendor's time from this list") ?></h1>
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
                            if (Yii::$app->session->hasFlash('success')) {
                                Yii::$app->session->setFlash('success', 'You\'ve just made an order with this ' .
                                    $dataProvider['username'] . ' vendor. Just wait for his the confirmation.');
                            }
                            return Html::a('<span class="glyphicon glyphicon-time"></span>', ['client/buy-vendor', 'id' => $dataProvider['vendor_id']]);
                        }
                    ]
                ],
            ],
        ]
    );

    ?>

</div>
