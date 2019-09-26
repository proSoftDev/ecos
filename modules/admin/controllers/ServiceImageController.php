<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ServiceImage;
use app\models\search\ServiceImageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ServiceImageController implements the CRUD actions for ServiceImage model.
 */
class ServiceImageController extends BackendController
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
     * Lists all ServiceImage models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServiceImageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ServiceImage model.
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
     * Creates a new ServiceImage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ServiceImage();
        if ($model->load(Yii::$app->request->post())) {
            $file = UploadedFile::getInstances($model, 'image');
            $service_id = $model->service_id;
            foreach ($file as $v) {
                $model = new ServiceImage();
                $time = time();
                $v->saveAs($model->path . $time . '_' . $v->baseName . '.' . $v->extension);
                $model->image = $time . '_' . $v->baseName . '.' . $v->extension;
                $model->service_id = $service_id;
                $model->save(false);
            }

            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ServiceImage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');

            if($image == null){
                $model->image = $oldImage;
            }else{
                $time = time();
                $image->saveAs($model->path . $time . '_' . $image->baseName . '.' . $image->extension);
                $model->image = $time . '_' . $image->baseName . '.' . $image->extension;
                if(!($oldImage == null)){
                    unlink($model->path . $oldImage);
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
     * Deletes an existing ServiceImage model.
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
     * Finds the ServiceImage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ServiceImage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ServiceImage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
