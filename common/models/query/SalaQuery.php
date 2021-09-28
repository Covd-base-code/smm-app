<?php

namespace common\models\query;

use common\models\Sala;

/**
 * This is the ActiveQuery class for [[\common\models\Sala]].
 *
 * @see \common\models\Sala
 */
class SalaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Sala[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Sala|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }


    public function freeRooms()
    {
        return $this->andWhere(['estado' => 0]);
    }
}
