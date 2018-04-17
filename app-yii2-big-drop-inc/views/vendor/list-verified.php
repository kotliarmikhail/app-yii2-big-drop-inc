<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;


/* @var $this yii\web\View */
/* @var $searchModel app\models\serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Confirm Sale';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
          'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'service_id' ,
            'user_id' ,
            'client_id',
            'price',
            'created_date',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['activate', 'deactivate']),
                'buttons' => [
                    'activate' => function ( $url, $dataProvider) {
                        if ($dataProvider['vendor_confirm'] == 1) {
                            return '';
                        }
                        $options = [
                            'title' => 'Activate',
                            'aria-label' => 'Activate',
                            'data-confirm' => 'Are you sure you want to activate this user?',
                            'data-method' => 'post',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', ['vendor/activate-service','id'=>$dataProvider['service_id']], $options);

                    },
                    'deactivate' => function ($url, $dataProvider) {
                        if ($dataProvider['vendor_confirm'] == 0) {
                            return '';
                        }
                        $options = [
                            'title' => 'Deactivate',
                            'aria-label' => 'Deactivate',
                            'data-confirm' => 'Are you sure you want to deactivate this user?',
                            'data-method' => 'post',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', ['vendor/deactivate-service','id'=>$dataProvider['service_id']], $options);
                    }
                ]

            ],
        ],
    ]);

    ?>

</div>
