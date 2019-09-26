<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Catalog;
use app\models\search\CatalogSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CatalogController implements the CRUD actions for Catalog model.
 */
class CatalogController extends BackendController
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
     * Lists all Catalog models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CatalogSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Catalog model.
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
     * Creates a new Catalog model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Catalog();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->parent_id){
                $model->level = $model->parent->level + 1;
            }else{
                $model->level = 1;
            }

            $image = UploadedFile::getInstance($model, 'image');
            if($image != null) {
                $time = time();
                $image->saveAs($model->path . $time . '_' . $image->baseName . '.' . $image->extension);
                $model->image = $time . '_' . $image->baseName . '.' . $image->extension;
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
     * Updates an existing Catalog model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $oldImage = $model->image;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($model->parent_id){
                $model->level = $model->parent->level + 1;
            }else{
                $model->level = 1;
            }

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
     * Deletes an existing Catalog model.
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
     * Finds the Catalog model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Catalog the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Catalog::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMoveUp($id)
    {
        $model = Catalog::findOne($id);
        if ($model->sort != 1) {
            $sort = $model->sort - 1;
            $model_down = Catalog::find()->where("sort = $sort")->one();
            $model_down->sort += 1;
            $model_down->save(false);

            $model->sort -= 1;
            $model->save(false);
        }
        $this->redirect(['index']);
    }

    public function actionMoveDown($id)
    {
        $model = Catalog::findOne($id);
        $model_max_sort = Catalog::find()->orderBy("sort DESC")->one();

        if ($model->id != $model_max_sort->id) {
            $sort = $model->sort + 1;
            $model_up = Catalog::find()->where("sort = $sort")->one();
            $model_up->sort -= 1;
            $model_up->save(false);

            $model->sort += 1;
            $model->save(false);
        }
        $this->redirect(['index']);
    }
}
