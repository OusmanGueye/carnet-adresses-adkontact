<?php

/** @var yii\web\View $this */

use common\models\Contact;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="card mt-4">
            <div class="card-body">
                <?php if (Yii::$app->user->can('admin')): ?>
                    <p>
                        <?= Html::a('Ajouter Contact', ['create'], ['class' => 'btn btn-success']) ?>
                    </p>
                <?php endif; ?>

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
                                return $model->country->name; // Supposant que "country" est la relation dans votre modèle "Contact" et "name" est le nom du pays dans le modèle "Country"
                            },
                        ],
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Contact $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                            },
                            'visibleButtons' => [
                                'update' => function ($model, $key, $index) {
                                    return Yii::$app->user->can('moderator') || Yii::$app->user->can('admin'); // Vérifie si l'utilisateur a le rôle "moderator" ou "admin"
                                },
                                // Ajoutez ici d'autres boutons si nécessaire, par exemple 'delete' => ...
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>

    </div>
</div>
