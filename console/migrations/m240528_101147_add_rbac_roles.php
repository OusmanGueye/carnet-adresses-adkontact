<?php

use yii\db\Migration;

/**
 * Class m240528_101147_add_rbac_roles
 */
class m240528_101147_add_rbac_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // Ajouter la permission "manageContacts"
        $manageContacts = $auth->createPermission('manageContacts');
        $manageContacts->description = 'Manage contacts';
        $auth->add($manageContacts);

        // Ajouter le rôle "moderator" et lui attribuer la permission "manageContacts"
        $moderator = $auth->createRole('moderator');
        $auth->add($moderator);
        $auth->addChild($moderator, $manageContacts);

        // Ajouter le rôle "admin" et lui attribuer le rôle "moderator"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $moderator);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240528_101147_add_rbac_roles cannot be reverted.\n";

        $auth = Yii::$app->authManager;

        $auth->removeAll();

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240528_101147_add_rbac_roles cannot be reverted.\n";

        return false;
    }
    */
}
