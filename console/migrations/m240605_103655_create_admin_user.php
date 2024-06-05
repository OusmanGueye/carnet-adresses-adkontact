<?php

use yii\db\Migration;

/**
 * Class m240605_103655_create_admin_user
 */
class m240605_103655_create_admin_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Create admin user
        $this->insert('{{%user}}', [
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password_hash' => Yii::$app->security->generatePasswordHash('admin_password'),
            'auth_key' => Yii::$app->security->generateRandomString(),
            'status' => 10, // Active status
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        // Get the ID of the newly created user
        $userId = $this->db->getLastInsertID();

        // Assign admin role
        $auth = Yii::$app->authManager;
        $adminRole = $auth->getRole('admin');
        $auth->assign($adminRole, $userId);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Find the admin user by username
        $user = (new \yii\db\Query())
            ->select('id')
            ->from('{{%user}}')
            ->where(['username' => 'admin'])
            ->one();

        if ($user) {
            // Revoke admin role
            $auth = Yii::$app->authManager;
            $auth->revokeAll($user['id']);

            // Delete the admin user
            $this->delete('{{%user}}', ['id' => $user['id']]);
        }
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240605_103655_create_admin_user cannot be reverted.\n";

        return false;
    }
    */
}
