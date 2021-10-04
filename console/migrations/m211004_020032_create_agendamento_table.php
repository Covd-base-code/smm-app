<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%agendamentos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%empresa}}`
 * - `{{%Sala}}`
 * - `{{%user}}`
 */
class m211004_020032_create_agendamento_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%agendamentos}}', [
            'id' => $this->primaryKey(),
            'empresa' => $this->integer(11),
            'numero_salas' => $this->integer(11)->notNull(),
            'sala' => $this->integer(11),
            'numero_pacientes' => $this->integer()->notNull(),
            'periodo' => $this->string()->notNull(),
            'created_by' => $this->integer(11),
            'created_at' => $this->integer(11),
        ]);

        // creates index for column `empresa`
        $this->createIndex(
            '{{%idx-agendamento-empresa}}',
            '{{%agendamentos}}',
            'empresa'
        );

        // add foreign key for table `{{%empresa}}`
        $this->addForeignKey(
            '{{%fk-agendamento-empresa}}',
            '{{%agendamentos}}',
            'empresa',
            '{{%empresa}}',
            'id',
            'CASCADE'
        );

        // creates index for column `sala`
        $this->createIndex(
            '{{%idx-agendamento-sala}}',
            '{{%agendamentos}}',
            'sala'
        );

        // add foreign key for table `{{%Sala}}`
        $this->addForeignKey(
            '{{%fk-agendamento-sala}}',
            '{{%agendamentos}}',
            'sala',
            '{{%Sala}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-agendamento-created_by}}',
            '{{%agendamentos}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-agendamento-created_by}}',
            '{{%agendamentos}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%empresa}}`
        $this->dropForeignKey(
            '{{%fk-agendamento-empresa}}',
            '{{%agendamentos}}'
        );

        // drops index for column `empresa`
        $this->dropIndex(
            '{{%idx-agendamento-empresa}}',
            '{{%agendamentos}}'
        );

        // drops foreign key for table `{{%Sala}}`
        $this->dropForeignKey(
            '{{%fk-agendamento-sala}}',
            '{{%agendamentos}}'
        );

        // drops index for column `sala`
        $this->dropIndex(
            '{{%idx-agendamento-sala}}',
            '{{%agendamentos}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-agendamento-created_by}}',
            '{{%agendamentos}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-agendamento-created_by}}',
            '{{%agendamentos}}'
        );

        $this->dropTable('{{%agendamentos}}');
    }
}
