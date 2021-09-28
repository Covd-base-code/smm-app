<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%csv_form}}".
 *
 * @property int $id
 */
class CsvForm extends \yii\db\ActiveRecord
{
    public $file;

    public function rules()
    {
        return [
            [['file'], 'required'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'csv', 'maxSize' => 1024 * 1024 * 10],
            // [['file'], 'allowEmpty' => false]
        ];
    }


    // public function rules()
    // {
    //     // NOTE: you should only define rules for those attributes that
    //     // will receive user inputs.
    //     return array(
    //         array(
    //             'file', 'file',
    //             'types' => 'csv',
    //             'maxSize' => 1024 * 1024 * 10, // 10MB
    //             'tooLarge' => 'The file was larger than 10MB. Please upload a smaller file.',
    //             'allowEmpty' => false
    //         ),
    //     );
    // }

    public function attributeLabels()
    {
        return [
            'file' => 'Lista',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%csv_form}}';
    }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function rules()
    // {
    //     return [];
    // }

    // /**
    //  * {@inheritdoc}
    //  */
    // public function attributeLabels()
    // {
    //     return [
    //         'id' => 'ID',
    //     ];
    // }

    /**
     * {@inheritdoc}
     * @return CsvFormQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CsvFormQuery(get_called_class());
    }
}
