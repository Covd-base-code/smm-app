<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%csv_form}}`.
 */
class m210926_191949_create_csv_form_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%csv_form}}', [
            'id' => $this->primaryKey(),
            'file' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%csv_form}}');
    }
}
