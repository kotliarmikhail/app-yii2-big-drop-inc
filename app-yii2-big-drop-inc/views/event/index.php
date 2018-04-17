<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="event-index">
    <?php $this->registerJsFile(
        '@web/js/main.js',
        ['depends' => [\yii\web\JqueryAsset::className()]]
    );
    ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <?php
    Modal::begin([
        'header' => '<h4>Job Created</h4>',
        'id' => 'modal',
        'size' => 'modal-lg',
    ]);

    echo "<div id='modalContent'></div>";
    Modal::end();
    ?>

    <?= \yii2fullcalendar\yii2fullcalendar::widget(array(
        'events' => $events,
    ));

    ?>
</div>
