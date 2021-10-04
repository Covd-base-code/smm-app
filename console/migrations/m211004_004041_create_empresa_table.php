<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%empresa}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%User}}`
 */
class m211004_004041_create_empresa_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%empresa}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'endereco' => $this->string()->notNull(),
            'nuit' => $this->integer()->notNull(),
            'contacto' => $this->string()->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-empresa-created_by}}',
            '{{%empresa}}',
            'created_by'
        );

        // add foreign key for table `{{%User}}`
        $this->addForeignKey(
            '{{%fk-empresa-created_by}}',
            '{{%empresa}}',
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
            '{{%fk-empresa-created_by}}',
            '{{%empresa}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-empresa-created_by}}',
            '{{%empresa}}'
        );

        $this->dropTable('{{%empresa}}');
    }
}
