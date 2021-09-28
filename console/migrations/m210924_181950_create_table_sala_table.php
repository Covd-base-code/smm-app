<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sala}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%User}}`
 */
class m210924_181950_create_table_sala_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sala}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string(16)->notNull(),
            'lotacao' => $this->integer()->notNull(),
            'localizacao' => $this->string()->notNull(),
            'estado' => $this->string()->notNull(),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-table_sala-created_by}}',
            '{{%sala}}',
            'created_by'
        );

        // add foreign key for table `{{%User}}`
        $this->addForeignKey(
            '{{%fk-table_sala-created_by}}',
            '{{%sala}}',
            'created_by',
            '{{%User}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%User}}`
        $this->dropForeignKey(
            '{{%fk-table_sala-created_by}}',
            '{{%sala}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-table_sala-created_by}}',
            '{{%sala}}'
        );

        $this->dropTable('{{%sala}}');
    }
}
