<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\User $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="card">
    <div class="card-body">
        <div class="user-view" style="font-size: medium">
            <p class="float-end">
                <?= Html::a('Modifier', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Supprimer', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'username',
                    'email:email',
                    [
                        'attribute' => 'status',
                        'format' => 'html',
                        'value' => function ($model) {
                            $badgeClass = User::getStatusBadgeClass($model->status);
                            $statusLabel = User::getStatusLabel($model->status);
                            return Html::tag('span', $statusLabel, ['class' => $badgeClass]);
                        },
                    ],
                    [
                        'attribute' => 'created_at',
                        'format' => ['date', 'php:d M Y H:i:s'],
                    ],
                    [
                        'attribute' => 'updated_at',
                        'format' => ['date', 'php:d M Y H:i:s'],
                    ],
                ],
            ]) ?>

        </div>
    </div>
</div>

