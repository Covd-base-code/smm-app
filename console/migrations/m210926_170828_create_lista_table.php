<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%lista}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%Agendamento}}`
 * - `{{%User}}`
 */
class m210926_170828_create_lista_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lista}}', [
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
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ]);

        // creates index for column `requisicao`
        $this->createIndex(
            '{{%idx-lista-requisicao}}',
            '{{%lista}}',
            'requisicao'
        );

        // add foreign key for table `{{%Agendamento}}`
        $this->addForeignKey(
            '{{%fk-lista-requisicao}}',
            '{{%lista}}',
            'requisicao',
            '{{%Agendamento}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-lista-created_by}}',
            '{{%lista}}',
            'created_by'
        );

        // add foreign key for table `{{%User}}`
        $this->addForeignKey(
            '{{%fk-lista-created_by}}',
            '{{%lista}}',
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
            '{{%fk-lista-requisicao}}',
            '{{%lista}}'
        );

        // drops index for column `requisicao`
        $this->dropIndex(
            '{{%idx-lista-requisicao}}',
            '{{%lista}}'
        );

        // drops foreign key for table `{{%User}}`
        $this->dropForeignKey(
            '{{%fk-lista-created_by}}',
            '{{%lista}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-lista-created_by}}',
            '{{%lista}}'
        );

        $this->dropTable('{{%lista}}');
    }
}
