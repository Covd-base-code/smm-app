<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[Lista]].
 *
 * @see Lista
 */
class ListaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Lista[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Lista|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
