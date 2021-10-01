<?php

namespace frontend\controllers;

use Yii;
use yii\db\Exception;
use yii\web\Controller;
use common\models\Lista;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use Faker\Provider\DateTime;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Date;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
     * Lists all Lista models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Lista::find()->andWhere(['created_by' => Yii::$app->user->id]),
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

        return $this->render('create', [
            'model' => $model,
        ]);
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
                        $updated_at = date("Y-m-d");
                        $sql = "INSERT INTO lista(nome,sexo,data_nascimento,provincia,distrito,endereco,profissao,tipo_beneficiario,tipo_documento,numero_documento,requisicao,created_at,updated_at) VALUES ('$nome', '$sexo', '$data_nascimento','$provincia', '$distrito','$endereco','$profissao', '$tipo_beneficiario', '$tipo_documento','$numero_documento','$requisicao','$created_at','$updated_at')";

                        $query = Yii::$app->db->createCommand($sql)->execute();
                    }
                    if ($query) {
                        Yii::$app->session->setFlash('success', "Lista submetida com sucesso.");
                    } else {
                        Yii::$app->session->setFlash('error', "Erro ao carregar lista.");
                    }
                }
            }
        }
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



    // public function actionImportExcel()
    // {
    //     $inputFile = '/web/storage/listas/lista_vacinacao.xlsx';
    //     try {
    //         $inputTypeFile = \PHPExcel_IOFactory::identify($inputFile);
    //         $objReader = \PHPExcel_IOFactory::createReader($inputTypeFile);
    //         $objPHPExcel = $objReader->load($inputFile);
    //     } catch (Exception $e) {
    //         die('Error');
    //     }

    //     $sheet = $objPHPExcel->getSheet(0);

    //     $highestRow = $sheet->getHighestRow();
    //     $highestColumn = $sheet->getHighestColumn();

    //     for ($row = 1; $row <= $highestRow; $row++) {

    //         $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
    //         if ($row = 1) {
    //             continue;
    //         }

    //         $model = new Lista();
    //         $model->nome = $row[0][0];
    //         $model->sexo = $row[0][1];
    //         $model->data_nascimento = $row[0][2];
    //         $model->provincia = $row[0][3];
    //         $model->distrito = $row[0][4];
    //         $model->endereco = $row[0][5];
    //         $model->profissao = $row[0][6];
    //         $model->tipo_beneficiario = $row[0][7];
    //         $model->tipo_documento = $row[0][8];
    //         $model->numero_documento = $row[0][9];
    //         $model->created_at = date("Y/m/d");
    //         $model->updated_at = date("Y/m/d");
    //         $model->save();
    //         print_r($model->getErrors());
    //     }


    //     // if (isset($_POST['csv'])) {
    //     //     $model->attributes = $_POST['csv'];
    //     //     $filelist = UploadedFile::getInstancesByName('csvfile');
    //     //     // To validate 
    //     //     if ($filelist)
    //     //         $model->csvfile = 1;

    //     //     if ($model->validate()) {
    //     //         foreach ($filelist as $file) {
    //     //             try {
    //     //                 $transaction = Yii::$app->db->beginTransaction();
    //     //                 $handle = fopen("$file->tempName", "r");
    //     //                 $row = 1;
    //     //                 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
    //     //                     if ($row > 1) {
    //     //                         $newmodel = new Lista;
    //     //                         $newmodel->nome = $data[0];
    //     //                         $newmodel->sexo = $data[1];
    //     //                         $newmodel->data_nascimento = $data[2];
    //     //                         $newmodel->provincia = $data[3];
    //     //                         $newmodel->distrito = $data[4];
    //     //                         $newmodel->profissao = $data[5];
    //     //                         $newmodel->tipo_beneficiario = $data[6];
    //     //                         $newmodel->tipo_documento = $data[7];
    //     //                         $newmodel->numero_documento = $data[8];
    //     //                         $newmodel->requisicao = $data[9];
    //     //                         $newmodel->save();
    //     //                     }
    //     //                     $row++;
    //     //                 }
    //     //                 $transaction->commit();
    //     //             } catch (Exception $error) {
    //     //                 print_r($error);
    //     //                 $transaction->rollback();
    //     //             }
    //     //         }
    //     //     }
    //     // }
    //     $this->render('index', array(
    //         'model' => $model,
    //     ));
    // }
}
