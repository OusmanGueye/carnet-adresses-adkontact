<?php

use common\models\Country;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\Country $model */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1>Liste des pays</h1>

    <p>
<!--        --><?php //= Html::a('Ajouter Pays', ['create'], ['class' => 'btn btn-success ']) ?>
        <a id="add-country-btn" class="btn btn-success">Ajouter Pays</a>
    </p>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="country-table-body">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($dataProvider->models as $index => $country) : ?>
                        <tr>
                            <th scope="row"><?= $index + 1 ?></th>
                            <td><?= Html::encode($country->name) ?></td>
                            <td>
                                <?= Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $country->id], ['class' => 'btn btn-sm btn-primary', 'title' => 'View']) ?>
                                <?= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $country->id], ['class' => 'btn btn-sm btn-warning', 'title' => 'Update']) ?>
                                <?= Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $country->id], [
                                    'class' => 'btn btn-sm btn-danger',
                                    'title' => 'Delete',
                                    'data' => [
                                        'confirm' => 'Are you sure you want to delete this item?',
                                        'method' => 'post',
                                    ],
                                ]) ?>
                                <button type="button" class="btn btn-sm btn-warning open-update-modal" data-country-id="<?= $country->id ?>" data-name="<?= $country->name ?>" title="Update">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add-country-modal" tabindex="-1" aria-labelledby="addCountryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCountryModalLabel">Ajouter Pays</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire d'ajout de pays -->
                    <div class="country-form">

                        <?php $form = ActiveForm::begin([
                            'action' => ['country/ajax'],
                            'options' => [
                                'class' => 'comment-form'
                            ]
                        ]); ?>

                        <?= $form->field($model, 'name');?>

                        <div class="form-group text-end mt-3">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modale de mise à jour -->
<!--    <div class="modal fade" id="update-country-modal" tabindex="-1" aria-labelledby="updateCountryModalLabel" aria-hidden="true">-->
<!--        <div class="modal-dialog">-->
<!--            <div class="modal-content">-->
<!--                <div class="modal-header">-->
<!--                    <h5 class="modal-title" id="updateCountryModalLabel">Mettre à jour le pays</h5>-->
<!--                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                </div>-->
<!--                <div class="modal-body">-->
<!--                    <!-- Formulaire de mise à jour du pays -->-->
<!--                    <form id="update-country-form">-->
<!--                        <input type="hidden" name="country_id" id="country-id-input">-->
<!--                        <div class="form-group">-->
<!--                            <label for="country-name">Nom du pays</label>-->
<!--                            <input type="text" class="form-control" id="country-name" name="name" ">-->
<!--                        </div>-->
<!--                        <div class="form-group text-end mt-3">-->
<!--                            <button type="submit" class="btn btn-primary">Enregistrer</button>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

    <!-- Modal de mise à jour du pays -->
    <?php Modal::begin([
        'title' => 'Mettre à jour le pays',
        'id' => 'update-country-modal',
        'size' => Modal::SIZE_LARGE,
        'options' => ['class' => 'modal-dialog']
    ]); ?>

    <!-- Formulaire de mise à jour du pays -->
    <?php $form = ActiveForm::begin([
        'id' => 'update-country-form'
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['id' => 'country-name']) ?>

    <div class="form-group text-end mt-3">
        <?= Html::submitButton('Enregistrer', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Modal::end(); ?>


</div>

