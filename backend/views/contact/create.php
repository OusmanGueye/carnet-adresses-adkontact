<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Contact $model */

$this->title = 'Create Contact';
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-create">

    <h3>Ajouter Nouveaux Contact</h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
