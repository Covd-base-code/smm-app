<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%agendamento}}".
 *
 * @property int $id
 * @property string $data_agendamento
 * @property string $empresa
 * @property string $endereco
 * @property int $nuit
 * @property string $contacto
 * @property int $created_at
 * @property int|null $created_by
 * @property int|null $sala
 */
class Agendamento extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%agendamento}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_agendamento', 'empresa', 'endereco', 'nuit', 'contacto'], 'required'],
            [['data_agendamento'], 'safe'],
            [['nuit', 'created_at', 'created_by', 'updated_at', 'sala'], 'integer'],
            [['empresa', 'endereco', 'contacto'], 'string', 'max' => 255],
            // ['lista', 'file', 'extensions' => ['csv']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_agendamento' => 'Data Agendamento',
            'empresa' => 'Empresa',
            'endereco' => 'Endereço',
            'nuit' => 'Nuit',
            'contacto' => 'Contacto',
            'created_at' => 'Criado em',
            'updated_at' => 'Actualizado por',
            'created_by' => 'Criado por',
            'sala' => 'Sala',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AgendamentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AgendamentoQuery(get_called_class());
    }
}
