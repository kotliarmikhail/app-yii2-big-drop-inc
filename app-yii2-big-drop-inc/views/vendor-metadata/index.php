<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VendorMetadataSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profile';

?>
<div class="vendor-metadata-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'sphere',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'update']),
                'buttons' => [
                    'view' => function ($url, $dataProvider) {

                        return Html::a('<span class="glyphicon glyphicon-user"></span>', ['vendor-metadata/view', 'id' => $dataProvider['vendor_id']]);

                    },
                    'update' => function ($url, $dataProvider) {

                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['vendor-metadata/update', 'id' => $dataProvider['vendor_id']]);
                    }
                ]
            ],

        ],
    ]); ?>
</div>
