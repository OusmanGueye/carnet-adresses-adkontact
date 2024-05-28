<?php

namespace controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // Suppression des données existantes
        $auth->removeAll();

        // Ajout des rôles
        $admin = $auth->createRole('admin');
        $admin->description = 'Administrateur du site';
        $auth->add($admin);

        $moderator = $auth->createRole('moderator');
        $moderator->description = 'Modérateur du site';
        $auth->add($moderator);

        $user = $auth->createRole('user');
        $user->description = 'Utilisateur du site';
        $auth->add($user);

        echo "Les rôles admin, moderator et user ont été créés.\n";
    }
}