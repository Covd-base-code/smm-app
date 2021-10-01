<?php

namespace frontend\controllers;


// require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Yii;
use yii\db\Exception;
use yii\db\Expression;
use yii\web\Controller;
use common\models\Lista;
use yii\web\UploadedFile;
use common\models\CsvForm;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

/**
 * CsvFormController implements the CRUD actions for CsvForm model.
 */
class CsvFormController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [

                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@']
                        ]
                    ]
                ],
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
     * Lists all CsvForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CsvForm::find()->andWhere(['created_by' => Yii::$app->user->id]),
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
     * Displays a single CsvForm model.
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
     * Creates a new CsvForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    // public function actionCreate()
    // {
    //     $model = new CsvForm();

    //     if ($this->request->isPost) {
    //         if ($model->load($this->request->post()) && $model->save()) {
    //             return $this->redirect(['view', 'id' => $model->id]);
    //         }
    //     } else {
    //         $model->loadDefaultValues();
    //     }

    //     return $this->render('create', [
    //         'model' => $model,
    //     ]);
    // }

    /**
     * Updates an existing CsvForm model.
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
     * Deletes an existing CsvForm model.
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
     * Finds the CsvForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CsvForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CsvForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionCreate()
    {
        $model = new CsvForm();

        if ($model->load(Yii::$app->request->post())) {


            $model->request = UploadedFile::getInstance($model, 'requisicao');
            $requisicao = $model->request;
            $req = UploadedFile::getInstance($model, 'requisicao');

            if ($model->file) {
                $time = time();
                $filename = $model->file;
                $csv = Yii::getAlias('@frontend/web/storage/listas/' . $time . $filename);
                $model->file->saveAs($csv);
                $model->file =  $filename;

                $handle = fopen($csv, "r");
                if ($handle) {

                    while (($data = fgetcsv($handle, 1000, ",")) !== false) {

                        $lsl = new Lista();
                        $nome = $data[0];
                        $sexo = $data[1];
                        $data_nascimento = $data[2];
                        $provincia = $data[3];
                        $distrito = $data[4];
                        $endereco = $data[5];
                        $profissao = $data[6];
                        $tipo_beneficiario = $data[7];
                        $tipo_documento = $data[8];
                        $numero_documento = $data[9];
                        $requisicao = 1;
                        // $lsl->save();
                        // $created_at = date("Y/m/d");
                        // $updated_at = date("Y/m/d");
                        // $nome = $data[0];
                        // $sexo = $data[1];
                        // $data_nascimento = $data[2];
                        // $provincia = $data[3];
                        // $distrito = $data[4];
                        // $endereco = $data[5];
                        // $profissao = $data[6];
                        // $tipo_beneficiario = $data[7];
                        // $tipo_documento = $data[8];
                        // $numero_documento = $data[9];

                        // print_r($handle);
                        // exit();
                        $sql = "INSERT INTO lista(nome, sexo, data_nascimento,provincia,distrito,endereco,profissao,tipo_beneficiario,tipo_documento,numero_documento,requisicao) VALUES ('$nome', '$sexo', '2020-11-20','$provincia', '$distrito','$endereco','$profissao', '$tipo_beneficiario', '$tipo_documento','$numero_documento','$requisicao')";
                        $query = Yii::$app->db->createCommand($sql)->execute();
                    }
                }

                if ($query) {
                    Yii::$app->session->setFlash('success', "Lista submetida com sucesso.");
                }
            }
        }
        return $this->render('create', ['model' => $model]);
    }
}
