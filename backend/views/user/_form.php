<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card">
    <div class="card-body">
        <div class="user-form" style="font-size: medium">

            <?php $form = ActiveForm::begin(['options' => ['class' => 'row g-3']]); ?>

            <div class="col-md-6">
                <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'class' => 'form-control']) ?>
            </div>

            <!--    <div class="col-md-6">-->
            <!--        --><?php //= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'class' => 'form-control']) ?>
            <!--    </div>-->

            <div class="col-12">
                <div class="form-group">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>

