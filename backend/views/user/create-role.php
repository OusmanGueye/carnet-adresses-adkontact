<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\RoleForm */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Créer un Rôle';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="role-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="role-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton('Créer', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
