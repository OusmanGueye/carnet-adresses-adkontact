<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Contact $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="card">
    <div class="card-body">
        <div class="contact-form" style="font-size: medium">

            <?php $form = ActiveForm::begin([
                'options' => ['class' => 'row g-3'],
            ]); ?>

            <div class="col-md-6">
                <?= $form->field($model, 'nom')->textInput(['maxlength' => true])->label('Nom') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'telephone')->textInput(['maxlength' => true])->label('Téléphone') ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'adresse')->textInput(['maxlength' => true])->label('Adresse') ?>
            </div>

            <!-- Remplacer le champ textInput par un dropdownList -->
            <div class="col-md-12">
                <?= $form->field($model, 'country_id')->dropDownList(
                    \yii\helpers\ArrayHelper::map(\common\models\Country::find()->all(), 'id', 'name'),
                    ['prompt' => 'Sélectionnez un pays']
                )->label('Pays') ?>
            </div>

            <div class="col-12 ">
                <?= Html::submitButton('Enregistre', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <?php if ($model->hasErrors()): ?>
                <div class="alert alert-danger">
                    <?= $form->errorSummary($model) ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>



