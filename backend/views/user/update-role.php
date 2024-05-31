<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RoleForm */
/* @var $role yii\rbac\Role */

$this->title = 'Modifier le Rôle : ' . $role->name;
$this->params['breadcrumbs'][] = ['label' => 'Liste des Rôles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="role-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="role-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Mettre à jour', ['class' => 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
