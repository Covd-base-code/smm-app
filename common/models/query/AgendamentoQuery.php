<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Agendamento]].
 *
 * @see \common\models\Agendamento
 */
class AgendamentoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Agendamento[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Agendamento|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function latest()
    {
        return $this->orderBy(['created_at' => SORT_DESC]);
    }
}
