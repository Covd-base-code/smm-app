<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%agendamento}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%User}}`
 * - `{{%Sala}}`
 */
class m210926_142110_create_table_agendamento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%agendamento}}', [
            'id' => $this->primaryKey(),
            'data_agendamento' => $this->date()->notNull(),
            'empresa' => $this->string()->notNull(),
            'endereco' => $this->string()->notNull(),
            'nuit' => $this->integer()->notNull(),
            'contacto' => $this->string()->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
            'sala' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-table_agendamento-created_by}}',
            '{{%agendamento}}',
            'created_by'
        );

        // add foreign key for table `{{%User}}`
        $this->addForeignKey(
            '{{%fk-table_agendamento-created_by}}',
            '{{%agendamento}}',
            'created_by',
            '{{%User}}',
            'id',
            'CASCADE'
        );

        // creates index for column `sala`
        $this->createIndex(
            '{{%idx-table_agendamento-sala}}',
            '{{%agendamento}}',
            'sala'
        );

        // add foreign key for table `{{%Sala}}`
        $this->addForeignKey(
            '{{%fk-table_agendamento-sala}}',
            '{{%agendamento}}',
            'sala',
            '{{%Sala}}',
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
            '{{%fk-table_agendamento-created_by}}',
            '{{%agendamento}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-table_agendamento-created_by}}',
            '{{%agendamento}}'
        );

        // drops foreign key for table `{{%Sala}}`
        $this->dropForeignKey(
            '{{%fk-table_agendamento-sala}}',
            '{{%agendamento}}'
        );

        // drops index for column `sala`
        $this->dropIndex(
            '{{%idx-table_agendamento-sala}}',
            '{{%agendamento}}'
        );

        $this->dropTable('{{%agendamento}}');
    }
}
