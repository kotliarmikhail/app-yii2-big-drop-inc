<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Services';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'title',
            'description:ntext',
            'price',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['view', 'update', 'activate', 'deactivate']),
                'buttons' => [
                    'activate' => function ($url, $dataProvider) {
                        if ($dataProvider->verify == 1) {
                            return '';
                        }
                        $options = [
                            'title' => 'Activate',
                            'aria-label' => 'Activate',
                            'data-confirm' => 'Are you sure you want to activate this user?',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url, $options);

                    },
                    'deactivate' => function ($url, $dataProvider) {
                        if ($dataProvider->verify == 0) {
                            return '';
                        }
                        $options = [
                            'title' => 'Deactivate',
                            'aria-label' => 'Deactivate',
                            'data-confirm' => 'Are you sure you want to Deactivate this user?',
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-remove"></span>', $url, $options);
                    }
                ]

            ],
        ],
    ]); ?>
</div>
