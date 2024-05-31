<?php

use yii\grid\GridView;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use common\models\Contact;

/** @var yii\data\ActiveDataProvider $dataProvider */

?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
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
            'urlCreator' => function ($action, Contact $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id' => $model->id]);
            },
            'template' => '{view} {update} {delete}',
        ],
    ],
]); ?>
