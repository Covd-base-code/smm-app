<?php

namespace frontend\controllers;

use Yii;
use yii\db\Exception;
use yii\web\Controller;
use common\models\Lista;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * ListaController implements the CRUD actions for Lista model.
 */
class ListaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Lista models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Lista::find(),
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

    /**
     * Displays a single Lista model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lista model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Lista();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Lista model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lista model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Lista model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Lista the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lista::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }



    public function actionImport()
    {
        $model = new Lista;
        if (isset($_POST['csv'])) {
            $model->attributes = $_POST['csv'];
            $filelist = UploadedFile::getInstancesByName('csvfile');
            // To validate 
            if ($filelist)
                $model->csvfile = 1;

            if ($model->validate()) {
                foreach ($filelist as $file) {
                    try {
                        $transaction = Yii::$app->db->beginTransaction();
                        $handle = fopen("$file->tempName", "r");
                        $row = 1;
                        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                            if ($row > 1) {
                                $newmodel = new Lista;
                                $newmodel->nome = $data[0];
                                $newmodel->sexo = $data[1];
                                $newmodel->data_nascimento = $data[2];
                                $newmodel->provincia = $data[3];
                                $newmodel->distrito = $data[4];
                                $newmodel->profissao = $data[5];
                                $newmodel->tipo_beneficiario = $data[6];
                                $newmodel->tipo_documento = $data[7];
                                $newmodel->numero_documento = $data[8];
                                $newmodel->requisicao = $data[9];
                                $newmodel->save();
                            }
                            $row++;
                        }
                        $transaction->commit();
                    } catch (Exception $error) {
                        print_r($error);
                        $transaction->rollback();
                    }
                }
            }
        }
        $this->render('importcsvform', array(
            'model' => $model,
        ));
    }
}
