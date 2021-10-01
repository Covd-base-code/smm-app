<?php

namespace frontend\controllers;
// use Yii;
use common\models\Sala;
use yii\web\Controller;
use yii\data\ActiveDataProvider;


class SalaController extends Controller
{

    /**
     * Lists all Sala models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Sala::find()->freeRooms(),
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
