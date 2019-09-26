<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ProductFile;
use app\models\search\ProductFileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductFileController implements the CRUD actions for ProductFile model.
 */
class ProductFileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductFile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductFileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductFile model.
     * @param integer $id
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
     * Creates a new ProductFile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductFile();

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'file');
            $file_en = UploadedFile::getInstance($model, 'file_en');
            $file_kz = UploadedFile::getInstance($model, 'file_kz');

            if($file != null) {
                $time = time();
                $file->saveAs($model->path . $time . '_ru_' . $file->baseName . '.' . $file->extension);
                $model->file = $time . '_ru_' . $file->baseName . '.' . $file->extension;
            }

            if($file_en != null) {
                $time = time();
                $file_en->saveAs($model->path . $time . '_en_' . $file_en->baseName . '.' . $file_en->extension);
                $model->file_en = $time . '_en_' . $file_en->baseName . '.' . $file_en->extension;
            }

            if($file_kz != null) {
                $time = time();
                $file_kz->saveAs($model->path . $time . '_kz_' . $file_kz->baseName . '.' . $file_kz->extension);
                $model->file_kz = $time . '_kz_' . $file_kz->baseName . '.' . $file_kz->extension;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProductFile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldFile = $model->file;
        $oldFileEN = $model->file_en;
        $oldFileKZ = $model->file_kz;

        if ($model->load(Yii::$app->request->post())) {

            $file = UploadedFile::getInstance($model, 'file');
            $file_en = UploadedFile::getInstance($model, 'file_en');
            $file_kz = UploadedFile::getInstance($model, 'file_kz');

            if($file == null){
                $model->file = $oldFile;
            }else{
                $time = time();
                $file->saveAs($model->path . $time . '_ru_' . $file->baseName . '.' . $file->extension);
                $model->file = $time . '_ru_' . $file->baseName . '.' . $file->extension;
                if(!($oldFile == null)){
                    unlink($model->path . $oldFile);
                }
            }

            if($file_en == null){
                $model->file_en = $oldFileEN;
            }else{
                $time = time();
                $file_en->saveAs($model->path . $time . '_en_' . $file_en->baseName . '.' . $file_en->extension);
                $model->file_en = $time . '_en_' . $file_en->baseName . '.' . $file_en->extension;
                if(!($oldFileEN == null)){
                    unlink($model->path . $oldFileEN);
                }
            }

            if($file_kz == null){
                $model->file_kz = $oldFileKZ;
            }else{
                $time = time();
                $file_kz->saveAs($model->path . $time . '_kz_' . $file_kz->baseName . '.' . $file_kz->extension);
                $model->file_kz = $time . '_kz_' . $file_kz->baseName . '.' . $file_kz->extension;
                if(!($oldFileKZ == null)){
                    unlink($model->path . $oldFileKZ);
                }
            }

            if($model->save()){
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductFile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductFile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProductFile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductFile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
