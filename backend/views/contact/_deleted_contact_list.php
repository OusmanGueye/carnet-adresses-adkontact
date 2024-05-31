<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\models\Contact;

/** @var yii\data\ActiveDataProvider $deletedDataProvider */

?>

<?= GridView::widget([
    'dataProvider' => $deletedDataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'nom',
        'email:email',
        'telephone',
        'adresse',
        [
            'attribute' => 'country_id',
            'label' => 'Pays',
            'value' => function ($model) {
                return $model->country->name;
            },
        ],
        [
            'class' => ActionColumn::className(),
            'template' => '{restore}',
            'buttons' => [
                'restore' => function ($url, $model, $key) {
                    return Html::a('Restore', ['restore', 'id' => $model->id], [
                        'class' => 'btn btn-success btn-sm',
                        'data-method' => 'post',
                        'data-confirm' => 'Are you sure you want to restore this contact?',
                    ]);
                },
            ],
        ],
    ],
]); ?>
