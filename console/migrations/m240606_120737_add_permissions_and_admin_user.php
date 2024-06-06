<?php

use yii\db\Migration;

/**
 * Class m240606_120737_add_permissions_and_admin_user
 */
class m240606_120737_add_permissions_and_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Initialisation du gestionnaire d'authentification
        /** @var DbManager $auth */
        $auth = Yii::$app->authManager;

        // Permissions à créer
        $permissions = [
            'contact-create' => 'Create Contact',
            'contact-delete' => 'Delete Contact',
            'contact-read' => 'Read Contact',
            'contact-update' => 'Update Contact',
            'country-create' => 'Create Country',
            'country-delete' => 'Delete Country',
            'country-read' => 'Read Country',
            'country-update' => 'Update Country',
            'create-user' => 'Create User',
            'delete-user' => 'Delete User',
            'manageContacts' => 'Manage Contacts',
            'restore-model' => 'Restore Model',
            'update-user' => 'Update User',
            'viewDashboard' => 'View Dashboard',
            'managerUser' => 'Manager User'
        ];

        // Création des permissions
        foreach ($permissions as $name => $description) {
            $perm = $auth->createPermission($name);
            $perm->description = $description;
            $auth->add($perm);
        }

        // Création du rôle admin
        $adminRole = $auth->createRole('admin');
        $auth->add($adminRole);

        // Assigner toutes les permissions au rôle admin
        foreach ($permissions as $name => $description) {
            $perm = $auth->getPermission($name);
            $auth->addChild($adminRole, $perm);
        }

        // Insertion de l'utilisateur admin
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin_password'), // Changez 'admin_password' par votre mot de passe
            'email' => 'admin@example.com',
            'status' => 10, // Supposons que 10 signifie "actif"
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        // Récupérer l'ID de l'utilisateur inséré
        $adminId = $this->db->getLastInsertID();

        // Assigner le rôle admin à l'utilisateur admin
        $auth->assign($adminRole, $adminId);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Suppression de l'utilisateur admin
        $this->delete('{{%user}}', ['username' => 'admin']);

        // Récupérer le composant d'authentification
        /** @var DbManager $auth */
        $auth = Yii::$app->authManager;

        // Suppression des assignations du rôle admin
        $adminRole = $auth->getRole('admin');
        if ($adminRole) {
            $auth->revoke($adminRole, $this->db->getLastInsertID());
        }

        // Suppression des permissions
        $permissions = [
            'contact-create',
            'contact-delete',
            'contact-read',
            'contact-update',
            'country-create',
            'country-delete',
            'country-read',
            'country-update',
            'create-user',
            'delete-user',
            'manageContacts',
            'restore-model',
            'update-user',
            'viewDashboard',
        ];

        foreach ($permissions as $name) {
            $perm = $auth->getPermission($name);
            if ($perm) {
                $auth->remove($perm);
            }
        }

        // Suppression du rôle admin
        if ($adminRole) {
            $auth->remove($adminRole);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240606_120737_add_permissions_and_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
