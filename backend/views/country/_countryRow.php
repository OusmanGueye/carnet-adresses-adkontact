<?php

use yii\helpers\Html;

/* @var $country common\models\Country */

?>

<tr>
    <th scope="row"><?= $country->id ?></th>
    <td><?= Html::encode($country->name) ?></td>
    <td>
        <?= Html::a('<i class="fas fa-eye"></i>', ['view', 'id' => $country->id], ['class' => 'btn btn-sm btn-primary', 'title' => 'View']) ?>
        <!--                                --><?php //= Html::a('<i class="fas fa-pencil-alt"></i>', ['update', 'id' => $country->id], ['class' => 'btn btn-sm btn-warning', 'title' => 'Update']) ?>
        <!--                                --><?php //= Html::a('<i class="fas fa-trash-alt"></i>', ['delete', 'id' => $country->id], [
        //                                    'class' => 'btn btn-sm btn-danger',
        //                                    'title' => 'Delete',
        //                                    'data' => [
        //                                        'confirm' => 'Are you sure you want to delete this item?',
        //                                        'method' => 'post',
        //                                    ],
        //                                ]) ?>
        <button type="button" class="btn btn-sm btn-warning open-update-modal" data-country-id="<?= $country->id ?>" data-name="<?= $country->name ?>" title="Update">
            <i class="fas fa-pencil-alt"></i>
        </button>
        <button type="button" id="delete-ajax" class="btn btn-sm btn-danger delete-ajax" data-country="<?= $country->id ?>" title="Delete">
            <i class="fas fa-trash-alt"></i>
        </button>
    </td>
</tr>

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
                    <input type="hidden" name="country_id" id="country-id-input">
                    <div class="form-group">
                        <label for="country-name">Nom du pays</label>
                        <input type="text" class="form-control" id="country-name" name="name" ">
                    </div>
                    <div class="form-group text-end mt-3">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
