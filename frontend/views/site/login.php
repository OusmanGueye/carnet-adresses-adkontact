<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="card">
    <div class="card-body">
        <div class="site-login">
            <h1 class="text-center">Bienvenue sur AdKontact</h1>
            <h2 class="text-center"><?= Html::encode($this->title) ?></h2>

            <p class="text-center">Veuillez remplir les champs suivants pour vous connecter :</p>

            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'p-3 border rounded']
                    ]); ?>

                    <?= $form->field($model, 'username')->textInput([
                        'autofocus' => true,
                        'class' => 'form-control rounded mb-3',
                        'placeholder' => 'Nom d\'utilisateur'
                    ])->label(false) ?>

                    <?= $form->field($model, 'password')->passwordInput([
                        'class' => 'form-control rounded mb-3',
                        'placeholder' => 'Mot de passe'
                    ])->label(false) ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'class' => 'form-check-input'
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Connexion', [
                            'class' => 'btn btn-primary btn-block',
                            'name' => 'login-button'
                        ]) ?>
                    </div>

                    <div class="my-1 mx-0" style="color:#999;">
                        Si vous avez oublié votre mot de passe, vous pouvez <?= Html::a('réinitialiser', ['site/request-password-reset']) ?>.
                        <br>
                        Besoin d'un nouvel e-mail de vérification ? <?= Html::a('Renvoyer', ['site/resend-verification-email']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
