<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%agendamentos}}".
 *
 * @property int $id
 * @property int|null $empresa
 * @property int $numero_salas
 * @property int|null $sala
 * @property int $numero_pacientes
 * @property string $periodo
 * @property int|null $created_by
 * @property int|null $created_at
 *
 * @property Empresa $empresa0
 */
class Agendamentos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%agendamentos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['empresa', 'numero_salas', 'sala', 'numero_pacientes', 'created_by', 'created_at'], 'integer'],
            [['numero_salas', 'numero_pacientes', 'periodo'], 'required'],
            [['periodo'], 'string', 'max' => 255],
            [['empresa'], 'exist', 'skipOnError' => true, 'targetClass' => Empresa::className(), 'targetAttribute' => ['empresa' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'empresa' => 'Empresa',
            'numero_salas' => 'Numero Salas',
            'sala' => 'Sala',
            'numero_pacientes' => 'Numero Pacientes',
            'periodo' => 'Periodo',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Empresa0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\EmpresaQuery
     */
    public function getEmpresa0()
    {
        return $this->hasOne(Empresa::className(), ['id' => 'empresa']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AgendamentosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AgendamentosQuery(get_called_class());
    }
}
