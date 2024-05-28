<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact}}`.
 */
class m240527_164235_create_contact_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact}}', [
            'id' => $this->primaryKey(),
            'nom' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'telephone' => $this->string(255)->notNull(),
            'adresse' => $this->string(255)->notNull(),
            'country_id' => $this->integer()->notNull(),
        ]);

        // Créer l'index pour la clé étrangère
        $this->createIndex(
            'idx-contact-country_id',
            'contact',
            'country_id'
        );

        // Ajouter la contrainte de clé étrangère
        $this->addForeignKey(
            'fk-contact-country_id',
            'contact',
            'country_id',
            'country',
            'id',
            'CASCADE'
        );

    }



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // Supprimez la contrainte de clé étrangère
        $this->dropForeignKey(
            'fk-contact-country_id',
            'contact'
        );

        // Supprimez l'index
        $this->dropIndex(
            'idx-contact-country_id',
            'contact'
        );

        $this->dropTable('{{%contact}}');
    }
}
