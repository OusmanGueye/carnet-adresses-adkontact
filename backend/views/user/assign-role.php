<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $allRoles yii\rbac\Role[] */
/* @var $allPermissions yii\rbac\Permission[] */

?>

<div class="assign-role-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <h4>Roles</h4>
            <?php foreach ($allRoles as $role): ?>
                <div class="form-check">
                    <?= Html::checkbox('roles[]', in_array($role->name, $userRoles), [
                        'value' => $role->name,
                        'class' => 'form-check-input',
                        'id' => 'role-' . $role->name
                    ]) ?>
                    <?= Html::label($role->name, 'role-' . $role->name, ['class' => 'form-check-label']) ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="col-md-6">
            <h4>Permissions</h4>
            <?php foreach ($allPermissions as $permission): ?>
                <div class="form-check">
                    <?= Html::checkbox('permissions[]', in_array($permission->name, $userPermissions), [
                        'value' => $permission->name,
                        'class' => 'form-check-input',
                        'id' => 'permission-' . $permission->name
                    ]) ?>
                    <?= Html::label($permission->name, 'permission-' . $permission->name, ['class' => 'form-check-label']) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
