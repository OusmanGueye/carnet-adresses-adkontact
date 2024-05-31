<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%contacts}}`.
 */
class m240531_163356_add_is_deleted_column_to_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%contact}}', 'is_deleted', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%contact}}', 'is_deleted');
    }
}
