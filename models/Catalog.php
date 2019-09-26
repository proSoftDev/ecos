<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property int $level
 * @property int $sort
 * @property int $status
 * @property string $created_at
 * @property string $name_en
 * @property string $name_kz
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $path = 'uploads/images/partner/';
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'status', 'name_en', 'name_kz'], 'required'],
            [['parent_id', 'level', 'sort', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'name_en', 'name_kz'], 'string', 'max' => 255],
            [['content', 'content_en', 'content_kz'], 'string'],
            [['image'], 'file', 'extensions' => 'png,jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родитель',
            'name' => 'Название',
            'image' => 'Картинка',
            'content' => 'Содержание',
            'level' => 'Level',
            'sort' => 'Sort',
            'status' => 'Статус',
            'created_at' => 'Дата создание',
            'name_en' => 'Название (EN)',
            'content_en' => 'Содержание (EN)',
            'name_kz' => 'Название (KZ)',
            'content_kz' => 'Содержание (KZ)',
        ];
    }

    public function beforeSave($insert){
        if($this->isNewRecord) {
            $model = Catalog::find()->orderBy('sort DESC')->one();
            if (!$model || $this->id != $model->id) {
                $this->sort = $model->sort + 1;
            }
        }
        return parent::beforeSave($insert);
    }

    public function getParent()
    {
        return $this->hasOne(Catalog::className(), ['id' => 'parent_id']);
    }

    public static function getList(){
        return \yii\helpers\ArrayHelper::map(Catalog::find()->all(),'id','name');
    }

    public function getName(){
        $name = "name".Yii::$app->session["lang"];
        return $this->$name;
    }

    public function getContent(){
        $content = "content".Yii::$app->session["lang"];
        return $this->$content;
    }

    public function getImage()
    {
        return ($this->image) ? '/uploads/images/partner/' . $this->image : '/no-image.png';
    }

    public static function getProducts($id, $text = ""){
        $arr = [];
        $partner = Catalog::find()->all();
        $arr[] = $id;
        foreach ($partner as $v) {
            if($v->parent_id == $id){
                $arr[] = $v->id;
                $level2 = Catalog::findAll(['parent_id' => $v->id]);
                if($level2 != null) {
                    foreach ($level2 as $v2) {
                        if ($v2->parent_id == $id) {
                            $arr[] = $v2->id;
                            $level3 = Catalog::findAll(['parent_id' => $v2->id]);
                            if($level3 != null) {
                                foreach ($level3 as $v3) {
                                    if ($v3->parent_id == $id) {
                                        $arr[] = $v3->id;
                                        $level4 = Catalog::findAll(['parent_id' => $v3->id]);
                                        if($level4 != null) {
                                            foreach ($level4 as $v4) {
                                                if ($v4->parent_id == $id) {
                                                    $arr[] = $v4->id;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

        }

        if($arr)
            if($text != null){
                $name = 'name'.Yii::$app->session['lang'];
                $product = Product::find()->where("catalog_id in (".implode(",", $arr).") AND ".$name." LIKE '%$text%'")->all();
            }else{
                $product = Product::find()->where('catalog_id in ('.implode(',', $arr).')')->all();
            }
        return $product;

    }
}
