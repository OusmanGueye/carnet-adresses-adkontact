<?php

use yii\db\Migration;

/**
 * Class m240603_114444_create_permissions
 */
class m240603_114444_create_permissions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Create permissions
        $createPermission = $auth->createPermission('contact-create');
        $createPermission->description = 'Permission to create a contact';
        $auth->add($createPermission);

        $readPermission = $auth->createPermission('contact-read');
        $readPermission->description = 'Permission to read a contact';
        $auth->add($readPermission);

        $updatePermission = $auth->createPermission('contact-update');
        $updatePermission->description = 'Permission to update a contact';
        $auth->add($updatePermission);

        $deletePermission = $auth->createPermission('contact-delete');
        $deletePermission->description = 'Permission to delete a contact';
        $auth->add($deletePermission);

        $createPermission = $auth->createPermission('country-create');
        $createPermission->description = 'Permission to create a country';
        $auth->add($createPermission);

        $readPermission = $auth->createPermission('country-read');
        $readPermission->description = 'Permission to read a country';
        $auth->add($readPermission);

        $updatePermission = $auth->createPermission('country-update');
        $updatePermission->description = 'Permission to update a country';
        $auth->add($updatePermission);

        $deletePermission = $auth->createPermission('country-delete');
        $deletePermission->description = 'Permission to delete a country';
        $auth->add($deletePermission);

        $restorePermission = $auth->createPermission('restore-model');
        $restorePermission->description = 'Restore a model';
        $auth->add($restorePermission);

        // Créer la permission pour créer un utilisateur
        $createUserPermission = $auth->createPermission('create-user');
        $createUserPermission->description = 'Create a new user';
        $auth->add($createUserPermission);

        // Créer la permission pour mettre à jour un utilisateur
        $updateUserPermission = $auth->createPermission('update-user');
        $updateUserPermission->description = 'Update an existing user';
        $auth->add($updateUserPermission);

        // Créer la permission pour supprimer un utilisateur
        $deleteUserPermission = $auth->createPermission('delete-user');
        $deleteUserPermission->description = 'Delete an existing user';
        $auth->add($deleteUserPermission);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $auth = Yii::$app->authManager;

        // Remove permissions
        $auth->remove('contact-create');
        $auth->remove('contact-read');
        $auth->remove('contact-update');
        $auth->remove('contact-delete');

        $auth->remove('country-create');
        $auth->remove('country-read');
        $auth->remove('country-update');
        $auth->remove('country-delete');

        $restorePermission = $auth->getPermission('restore-model');
        $auth->remove($restorePermission);

        $createUserPermission = $auth->getPermission('create-user');
        $auth->remove($createUserPermission);

        $updateUserPermission = $auth->getPermission('update-user');
        $auth->remove($updateUserPermission);

        $deleteUserPermission = $auth->getPermission('delete-user');
        $auth->remove($deleteUserPermission);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240603_114444_create_permissions cannot be reverted.\n";

        return false;
    }
    */
}
