<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use common\models\Paciente;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * PacienteController implements the CRUD actions for Paciente model.
 */
class PacienteController extends Controller
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
     * Lists all Paciente models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Paciente::find()->andWhere(['created_by' => Yii::$app->user->id]),
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
     * Displays a single Paciente model.
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
     * Creates a new Paciente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Paciente();

        if ($model->load(Yii::$app->request->post())) {

            $model->lista = UploadedFile::getInstance($model, 'lista');

            if ($model->lista) {
                $time = time();
                $filename = $model->lista;
                $csv = Yii::getAlias('@frontend/web/storage/listas/' . $filename);
                $model->lista->saveAs($csv);
                $model->lista =  $filename;
                $row = 0;
                $handle = fopen($csv, "r");
                if ($handle) {

                    while (($data = fgetcsv($handle, 1000, ",")) !== false) {

                        $row++;

                        if ($row == 1) {

                            continue;
                        }

                        $nome = $data[0];
                        $sexo = $data[1];
                        $data_nascimento = date('Y-m-d', strtotime($data[2]));
                        $provincia = $data[3];
                        $distrito = $data[4];
                        $endereco = $data[5];
                        $profissao = $data[6];
                        $tipo_beneficiario = $data[7];
                        $tipo_documento = $data[8];
                        $numero_documento = $data[9];
                        $requisicao = $model->requisicao;
                        $created_at = date("Y-m-d");
                        $created_by = Yii::$app->user->identity->id;
                        $sql = "INSERT INTO paciente(nome,sexo,data_nascimento,provincia,distrito,endereco,profissao,tipo_beneficiario,tipo_documento,numero_documento,requisicao,created_at,created_by) VALUES ('$nome', '$sexo', '$data_nascimento','$provincia', '$distrito','$endereco','$profissao', '$tipo_beneficiario', '$tipo_documento','$numero_documento','$requisicao','$created_at','$created_by')";

                        $query = Yii::$app->db->createCommand($sql)->execute();
                    }
                    if ($query) {

                        Yii::$app->session->setFlash('success', "Lista submetida com sucesso.");
                        return $this->refresh();
                    } else {
                        Yii::$app->session->setFlash('error', "Erro ao carregar lista.");
                    }
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Paciente model.
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
     * Deletes an existing Paciente model.
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
     * Finds the Paciente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Paciente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Paciente::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
