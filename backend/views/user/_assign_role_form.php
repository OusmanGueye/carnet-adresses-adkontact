<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $user common\models\User */
/* @var $allRoles yii\rbac\Role[] */
/* @var $userRoles yii\rbac\Role[] */

?>

<div class="assign-role-form">

    <?php $form = ActiveForm::begin(['action' => ['user/assign-role', 'id' => $user->id], 'id' => 'assign-role-form']); ?>

    <div class="row">
        <div class="col-md-12">
            <h4>Roles for <?= Html::encode($user->username) ?></h4>
            <?php foreach ($allRoles as $role): ?>
                <div class="form-check">
                    <?= Html::checkbox('roles[]', isset($userRoles[$role->name]), [
                        'value' => $role->name,
                        'class' => 'form-check-input',
                        'id' => 'role-' . $role->name
                    ]) ?>
                    <?= Html::label($role->name, 'role-' . $role->name, ['class' => 'form-check-label']) ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="form-group mt-3">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
