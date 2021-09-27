<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[CsvForm]].
 *
 * @see CsvForm
 */
class CsvFormQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CsvForm[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CsvForm|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
