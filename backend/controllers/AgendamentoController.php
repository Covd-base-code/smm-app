<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Agendamento;
use yii\data\ActiveDataProvider;


class AgendamentoController extends Controller
{
    /**
     * Lists all Agendamento models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Agendamento::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
