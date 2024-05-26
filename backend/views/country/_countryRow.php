<?php

use yii\helpers\Html;

/* @var $country common\models\Country */

?>

<tr>
    <th scope="row"><?= $country->id ?></th>
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
        <button type="button" class="btn btn-sm btn-warning open-update-modal" data-country-id="<?= $country->id ?>" title="Update">
            <i class="fas fa-pencil-alt"></i>
        </button>
    </td>
</tr>
