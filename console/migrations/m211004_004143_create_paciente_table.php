<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%paciente}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Agendamento}}`
 * - `{{%User}}`
 */
class m211004_004143_create_paciente_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%paciente}}', [
            'id' => $this->primaryKey(),
            'nome' => $this->string()->notNull(),
            'sexo' => $this->string()->notNull(),
            'data_nascimento' => $this->date()->notNull(),
            'provincia' => $this->string()->notNull(),
            'distrito' => $this->string()->notNull(),
            'endereco' => $this->string()->notNull(),
            'profissao' => $this->string()->notNull(),
            'tipo_beneficiario' => $this->string()->notNull(),
            'tipo_documento' => $this->string()->notNull(),
            'numero_documento' => $this->string()->notNull(),
            'requisicao' => $this->integer(11),
            'created_by' => $this->integer(11),
            'created_at' => $this->string(11),
        ]);

        // creates index for column `requisicao`
        $this->createIndex(
            '{{%idx-paciente-requisicao}}',
            '{{%paciente}}',
            'requisicao'
        );

        // add foreign key for table `{{%Agendamento}}`
        $this->addForeignKey(
            '{{%fk-paciente-requisicao}}',
            '{{%paciente}}',
            'requisicao',
            '{{%Agendamento}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-paciente-created_by}}',
            '{{%paciente}}',
            'created_by'
        );

        // add foreign key for table `{{%User}}`
        $this->addForeignKey(
            '{{%fk-paciente-created_by}}',
            '{{%paciente}}',
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
        // drops foreign key for table `{{%Agendamento}}`
        $this->dropForeignKey(
            '{{%fk-paciente-requisicao}}',
            '{{%paciente}}'
        );

        // drops index for column `requisicao`
        $this->dropIndex(
            '{{%idx-paciente-requisicao}}',
            '{{%paciente}}'
        );

        // drops foreign key for table `{{%User}}`
        $this->dropForeignKey(
            '{{%fk-paciente-created_by}}',
            '{{%paciente}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-paciente-created_by}}',
            '{{%paciente}}'
        );

        $this->dropTable('{{%paciente}}');
    }
}
