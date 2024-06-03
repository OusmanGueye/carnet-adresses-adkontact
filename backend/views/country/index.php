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
<div class="country-index" style="font-size: medium">

    <h1>Liste des pays</h1>

    <p>
<!--        --><?php //= Html::a('Ajouter Pays', ['create'], ['class' => 'btn btn-success ']) ?>
        <a id="add-country-btn" class="btn mb-4 float-end btn-success">Ajouter Pays</a>
    </p><br>

    <div class="card">
        <div class="card-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, $model, $key, $index) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{view} {update} {delete}',
                        'visibleButtons' => [
                            'view' => function ($model, $key, $index) {
                                return Yii::$app->user->can('country-read');
                            },
                            'update' => function ($model, $key, $index) {
                                return Yii::$app->user->can('country-update');
                            },
                            'delete' => function ($model, $key, $index) {
                                return Yii::$app->user->can('country-delete');
                            },
                        ],
                    ],
                ],
            ]); ?>
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
                    <div>

                        <?php $form = ActiveForm::begin([
                            'action' => ['country/ajax'],
                            'options' => [
                                'class' => 'comment-form'
                            ]
                        ]); ?>

                        <?= $form->field($model, 'name')->textInput(['id' => 'custom-id']); ?>

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
    <div class="modal fade" id="update-country-modal" tabindex="-1" aria-labelledby="updateCountryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateCountryModalLabel">Mettre à jour le pays</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de mise à jour du pays -->
                    <form id="update-country-form">
                        <input type="hidden" name="id" id="country-id-input">
                        <div class="form-group">
                            <label for="country-name1">Nom du pays</label>
                            <input type="text" class="form-control" id="country-name1" name="name" ">
                        </div>
                        <div class="form-group text-end mt-3">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

    document.getElementById('add-country-btn').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('add-country-modal'));
        myModal.show();
    });


    // Événement de clic sur le bouton de mise à jour
    $(".open-update-modal").click(function() {

        var countryId = $(this).data("country-id");
        var name =  $(this).data("name");

        $("#update-country-modal").modal("show");

        // Préparer l'URL pour récupérer les informations du pays
        var getUrl = '/get-country?id=' + countryId;

        // Préparer l'URL pour récupérer les informations du pays
        var getUrl = '<?= \yii\helpers\Url::to(['country/get-country']) ?>' + '?id=' + countryId;

        $("#country-name1").val(name);
        $("#country-id-input").val(countryId);

        // Envoyer une requête AJAX pour récupérer les informations du pays
        $.ajax({
            url: getUrl,
            type: 'GET',
            dataType: 'json'
        }).done(async function(response) {
            // Afficher la modale de mise à jour
            //$("#update-country-modal").modal("show");

        }).fail(function(xhr, status, error) {
            console.error(xhr.responseText);
        });
    });


    $(document).ready(function($) {
        $(document).on('click', '.delete-ajax', function() {
            console.log('click');
            var countryId = $(this).data("country");
            var deleteUrl = '<?= \yii\helpers\Url::to(['country/ajax-delete']) ?>' + '?id=' + countryId;

            console.log('Delete URL: ' + deleteUrl); // Debug: Vérifiez l'URL dans la console

            if (confirm('Êtes-vous sûr de vouloir supprimer ce pays ?')) {
                $.ajax({
                    url: deleteUrl,
                    type: 'GET', // Yii2 utilise POST même pour les actions DELETE
                    dataType: 'json',
                    success: function(response) {
                        if (response.data.success) {
                            console.log(response.data.message);
                            // Supprimer la ligne du tableau
                            $("#country-row-" + countryId).remove();
                        } else {
                            console.error(response.data.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });


</script>

