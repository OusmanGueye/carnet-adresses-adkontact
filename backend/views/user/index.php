<?php

use common\models\User;
use yii\bootstrap5\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index" style="font-size: medium">

    <h3>Liste Utilisateurs</h3>

    <div class="card">
        <div class="card-body">
            <p class="mb-4">
                <?= Html::a('Nouveau Utilisateur', ['create'], ['class' => 'btn btn-success float-end custom-gradient']) ?>
            </p>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
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
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, User $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        },
                        'template' => '{view} {update} {delete} {assign-role}',
                        'visibleButtons' => [
                            'view' => function ($model, $key, $index) {
                                return Yii::$app->user->can('user-view');
                            },
                            'update' => function ($model, $key, $index) {
                                return Yii::$app->user->can('update-user');
                            },
                            'delete' => function ($model, $key, $index) {
                                return Yii::$app->user->can('delete-user');
                            },
                            'assign-role' => function ($model, $key, $index) {
                                return Yii::$app->user->can('create-user');
                            },
                        ],
                        'buttons' => [
                            'assign-role' => function ($url, $model, $key) {
                                return Html::a('<i class="fas fa-user-lock"></i> Droit d\'accès', ['assign-role', 'id' => $model->id], [
                                    'title' => 'Définir les droits d\'accès',
                                    'class' => 'btn btn-primary btn-sm',
                                    'data-bs-toggle' => 'modal',
                                    'data-bs-target' => '#assignRoleModal',
                                    'data-id' => $model->id,
                                    'style' => 'margin-left: 10px;'
                                ]);
                            },
                        ],
                    ],
                ],
            ]); ?>
        </div>
    </div>

</div>

<?php
Modal::begin([
    'id' => 'assignRoleModal',
    'title' => '<h4>Assign Roles and Permissions</h4>',
    'size' => 'modal-lg',
]);

echo '<div id="assignRoleContent"></div>';

Modal::end();

$this->registerJs("
    $('#assignRoleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('id');
        var modal = $(this);

        $.ajax({
            url: '" . Url::to(['user/assign-role']) . "',
            data: { id: userId },
            success: function (data) {
                modal.find('#assignRoleContent').html(data);
            }
        });
    });
");
?>
