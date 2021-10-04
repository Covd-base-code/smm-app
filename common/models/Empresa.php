<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%empresa}}".
 *
 * @property int $id
 * @property string $nome
 * @property string $endereco
 * @property int $nuit
 * @property string $contacto
 * @property int $created_at
 * @property int|null $created_by
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%empresa}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'endereco', 'nuit', 'contacto', 'created_at'], 'required'],
            [['nuit', 'created_at', 'created_by'], 'integer'],
            [['nome', 'endereco', 'contacto'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'endereco' => 'Endereco',
            'nuit' => 'Nuit',
            'contacto' => 'Contacto',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EmpresaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EmpresaQuery(get_called_class());
    }
}
