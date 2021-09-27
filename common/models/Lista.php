<?php

namespace common\models;

use Yii;
use common\models\query\ListaQuery;

/**
 * This is the model class for table "{{%lista}}".
 *
 * @property int $id
 * @property string $nome
 * @property string $sexo
 * @property string $data_nascimento
 * @property string $provincia
 * @property string $distrito
 * @property string $endereco
 * @property string $profissao
 * @property string $tipo_beneficiario
 * @property string $tipo_documento
 * @property string $numero_documento
 * @property int|null $requisicao
 * @property int|null $created_by
 * @property int|null $created_at
 * @property int|null $updated_at
 */
class Lista extends \yii\db\ActiveRecord
{
    public $lista;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lista}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'sexo', 'data_nascimento', 'provincia', 'distrito', 'endereco', 'profissao', 'tipo_beneficiario', 'tipo_documento', 'numero_documento'], 'required'],
            [['data_nascimento'], 'safe'],
            [['requisicao', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['nome', 'sexo', 'provincia', 'distrito', 'endereco', 'profissao', 'tipo_beneficiario', 'tipo_documento', 'numero_documento'], 'string', 'max' => 255],
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
            'sexo' => 'Sexo',
            'data_nascimento' => 'Data Nascimento',
            'provincia' => 'Provincia',
            'distrito' => 'Distrito',
            'endereco' => 'Endereco',
            'profissao' => 'Profissao',
            'tipo_beneficiario' => 'Tipo Beneficiario',
            'tipo_documento' => 'Tipo Documento',
            'numero_documento' => 'Numero Documento',
            'requisicao' => 'Requisicao',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ListaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ListaQuery(get_called_class());
    }
}
