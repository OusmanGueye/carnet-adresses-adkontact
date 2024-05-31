<?php

use yii\db\Migration;

/**
 * Class m240531_103414_add_is_deleted_to_auth_item
 */
class m240531_103414_add_is_deleted_to_auth_item extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%auth_item}}', 'is_deleted', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m240531_103414_add_is_deleted_to_auth_item cannot be reverted.\n";

        $this->dropColumn('{{%auth_item}}', 'is_deleted');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m240531_103414_add_is_deleted_to_auth_item cannot be reverted.\n";

        return false;
    }
    */
}
