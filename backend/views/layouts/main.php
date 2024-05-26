<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;


AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php $this->beginBody() ?>

<style>
    .main {
        margin-left: 240px; /* Ajuster la marge pour correspondre à la nouvelle largeur du sidenav */
        font-size: 28px;
        padding: 20px;
        background-color: #f4f4f4;
        min-height: 100vh;
        transition: margin-left 0.3s; /* Transition pour l'effet de survol du sidenav */
    }
</style>

<div class="wrap">

    <main role="main">
        <?php echo $this->render('sidebar'); ?>

        <div class="main">
            <?php echo $this->render('header'); ?> <!-- Inclure le header -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-sm">
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => ['class' => 'breadcrumb-item']
                    ]) ?>
                </ol>
            </nav>

            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

</div>


<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-start">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        <p class="float-end"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
