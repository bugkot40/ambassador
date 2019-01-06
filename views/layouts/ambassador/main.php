<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAssetAmbassador;
use yii\helpers\Url;

AppAssetAmbassador::register($this);
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
<?php $menu = \app\classes\ambassador\ContentGenerator::getMenu() ?>
<?php $hotels = $menu['hotels']; ?>
<?php $relaxations = $menu['relaxations']; ?>

<div class="wrap">

    <ul>
        <?php foreach ($hotels as $hotel): ?>
            <li class="js_menu">
                <a class="js_menu" href="<?= Url::toRoute(['ambassador/section', 'id' => $hotel['id']]) ?>"
                   data-id="<?= $hotel['id'] ?>">
                    <?= $hotel['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach ($relaxations as $relaxation): ?>
            <li class="js_menu">
                <a class="js_menu" href="<?= Url::toRoute(['ambassador/section', 'id' => $relaxation['id']]) ?>"
                   data-id="<?= $relaxation['id'] ?>">
                    <?= $relaxation['name'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <div class="container">
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
