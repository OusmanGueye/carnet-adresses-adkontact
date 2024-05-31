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
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron bg-light p-4">
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <h1 class="display-4">Bienvenue sur notre plateforme de gestion des contacts de AdKontact Group</h1>
                        <p class="lead">Vous pouvez consulter, ajouter, modifier ou supprimer les contacts de l'entreprise.</p>
                        <?php if (Yii::$app->user->can('admin')): ?>
                            <p>
                                <?= Html::a('Ajouter un Contact', ['create'], ['class' => 'btn btn-primary']) ?>
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
                                            return Yii::$app->user->can('manageContacts'); // Vérifie si l'utilisateur a le rôle "moderator" ou "admin"
                                        },
                                        'delete' => function ($model, $key, $index) {
                                            return Yii::$app->user->can('manageContacts'); // Vérifie si l'utilisateur a le rôle "admin"
                                        },
                                        // Ajoutez ici d'autres boutons si nécessaire, par exemple 'delete' => ...
                                    ],
                                ],
                            ],
                        ]); ?>

                    <?php else: ?>
                        <h1 class="display-4">Bienvenue sur la plateforme de gestion des contacts de AdKontact Group</h1>
                        <p class="lead">Notre plateforme vous permet de gérer efficacement la liste des contacts de l'entreprise.</p>
                        <hr class="my-4">
                        <p class="lead">
                            <?= Html::a('Se connecter', ['site/login'], ['class' => 'btn btn-primary btn-lg']) ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>




