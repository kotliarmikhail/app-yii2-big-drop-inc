<?php

use yii\helpers\Html;
use yii\grid\GridView;
use mdm\admin\components\Helper;


/* @var $this yii\web\View */
/* @var $searchModel app\models\serviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Available services';
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
            'user_id',
            'title',
            'description:ntext',
            'price',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => Helper::filterActionColumn(['event']),
                'buttons' => [
                    'event' => function ($url, $model) {
                        $url = '/event/?id=' . $model->id;

                        return Html::a('<span class="glyphicon glyphicon-ok"></span>', $url);
                    },
                ]

            ],
        ],
    ]);

    ?>

</div>
