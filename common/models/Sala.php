<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sala}}".
 *
 * @property int $id
 * @property string $nome
 * @property int $lotacao
 * @property string $localizacao
 * @property string $estado
 * @property int|null $created_by
 */
class Sala extends \yii\db\ActiveRecord
{
    const STATUS_FREE = 'Livre'; //constantes do app
    const STATUS_BUSY = 'Ocupada';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%sala}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'lotacao', 'localizacao', 'estado'], 'required'],
            [['lotacao', 'created_by'], 'integer'],
            [['nome'], 'string', 'max' => 16],
            [['estado'], 'string'],
            ['estado', 'default', 'value' => self::STATUS_FREE],
            [['localizacao'], 'string', 'max' => 255],
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
            'lotacao' => 'Lotacao',
            'localizacao' => 'Localizacao',
            'estado' => 'Estado',
            'created_by' => 'Created By',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SalaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SalaQuery(get_called_class());
    }


    public function getStatusLabels()
    {
        return [
            self::STATUS_FREE,
            self::STATUS_BUSY,
        ];
    }

    public function getSalasFree()
    {
        $query = Sala::find()
            ->select([
                'id', 'nome'
            ])
            ->where(['estado' => '0']);

        return $query;
    }
}
