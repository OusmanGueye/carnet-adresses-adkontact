<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $user common\models\User */
/* @var $allRoles yii\rbac\Role[] */
/* @var $userRoles yii\rbac\Role[] */

?>

<div class="assign-role-form">
    <?php $form = ActiveForm::begin(['action' => ['user/assign-role', 'id' => $user->id], 'id' => 'assign-role-form']); ?>

    <h4>Roles for <?= Html::encode($user->username) ?></h4>
    <div class="row">
        <?php foreach ($allRoles as $role): ?>
            <div class="col-md-4">
                <div class="form-check">
                    <?= Html::checkbox('roles[]', isset($userRoles[$role->name]), [
                        'value' => $role->name,
                        'class' => 'form-check-input',
                        'id' => 'role-' . $role->name
                    ]) ?>
                    <?= Html::label($role->name, 'role-' . $role->name, ['class' => 'form-check-label']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
