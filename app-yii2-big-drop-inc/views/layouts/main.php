<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\Dropdown;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    $items = [];

    if (Yii::$app->user->can('vendorAccess')) {
        $items[] = ['label' => 'Create Service', 'url' => ['/service/index']];
        $items[] = ['label' => 'Confirm order(service)', 'url' => ['/vendor/list-verified']];
        $items[] = ['label' => 'List of success orders', 'url' => ['/vendor/show-success-order']];
        $items[] = ['label' => 'Change my sphere', 'url' => ['/vendor/edit-vendor-profile']];
        $items[] = ['label' => 'List of success orders(vendor time)', 'url' => ['/vendor/list-clients-for-buy-time']];
    }
    if (Yii::$app->user->can('clientAccess')) {
        $items[] = ['label' => 'List of available services', 'url' => ['/service/list-verified']];
        $items[] = ['label' => 'List of success buying the services', 'url' => ['/client/show-success-order']];
        $items[] = ['label' => 'Edit profile', 'url' => ['/client/view-profile']];
        $items[] = ['label' => 'List of available vendors (vendor time)', 'url' => ['/client/list-vendor']];
        $items[] = ['label' => 'List of success orders (vendor time)', 'url' => ['/client/show-success-order-vendor-time']];
    }

    if (Yii::$app->user->can('adminAccess')) {
        $items[] = ['label' => 'rbac', 'url' => ['/rbac/']];
        $items[] = ['label' => 'Check Services', 'url' => ['/admin/service/index']];
        $items[] = ['label' => 'Edit level\'s of vendors', 'url' => ['/admin/default/list-vendor']];
    }

$defaultLink = [];
    if (Yii::$app->user->isGuest) {
        $defaultLink[] = ['label' => 'Login', 'url' => ['/site/login']];
        $defaultLink[] = ['label' => 'SignUp', 'url' => ['/site/signup']];
    } else {
        $defaultLink[] =  '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',

                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    NavBar::begin([
            'brandLabel' => Yii::$app->name,
        //'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $defaultLink,
    ]);

    if (!Yii::$app->user->isGuest) {
        echo Nav::widget([
            'items' => [
                [
                    'label' => 'DROP IT DOWN',
                    'items' => $items,
                ],
            ],
            'options' => ['class' => 'navbar-nav navbar-right'],
        ]);
    }

    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">dev by kotliar</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
