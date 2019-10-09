<?php

namespace app\modules\admin\controllers;

use app\models\ProductImage;
use Yii;
use app\models\Product;
use app\models\search\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $images = ProductImage::findAll(['product_id' => $id]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'images' => $images
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        $images = new ProductImage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($images->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstances($images, 'image');
                foreach ($file as $v) {
                    $images = new ProductImage();
                    $time = time();
                    $v->saveAs($images->path . $time . '_' . $v->baseName . '.' . $v->extension);
                    $images->image = $time . '_' . $v->baseName . '.' . $v->extension;
                    $images->product_id = $model->id;
                    $images->save(false);
                }
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'images' => $images,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $images = new ProductImage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            if($images->load(Yii::$app->request->post())) {
                $file = UploadedFile::getInstances($images, 'image');
                if($file != null) {
                    $images->deleteImages($model->id);
                    foreach ($file as $v) {
                        $images = new ProductImage();
                        $time = time();
                        $v->saveAs($images->path . $time . '_' . $v->baseName . '.' . $v->extension);
                        $images->image = $time . '_' . $v->baseName . '.' . $v->extension;
                        $images->product_id = $model->id;
                        $images->save(false);
                    }
                }

            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'images' => $images,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        ProductImage::deleteImages($id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
