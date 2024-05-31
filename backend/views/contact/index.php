<?php

use common\models\Contact;
use yii\bootstrap5\Tabs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index" style="font-size: medium">

    <div class="card">
        <div class="card-body">
            <h1><?= Html::encode($this->title) ?></h1>

            <?= Html::a('Create Contact', ['create'], ['class' => 'btn btn-success mb-3']) ?>

            <?php
            echo Tabs::widget([
                'items' => [
                    [
                        'label' => 'Contacts',
                        'content' => $this->render('_contact_list', ['dataProvider' => $dataProvider]),
                        'active' => true,
                    ],
                    [
                        'label' => 'Deleted Contacts',
                        'content' => $this->render('_deleted_contact_list', ['deletedDataProvider' => $deletedDataProvider]),
                    ],
                ],
            ]);
            ?>
        </div>
    </div>


</div>
