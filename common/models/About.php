<?php

namespace common\models;

use common\components\StaticFunctions;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "about".
 *
 * @property int $id
 * @property string $title
 * @property string $main_image
 * @property string $info
 * @property string $created_date
 * @property string $updated_date
 * @property int $status
 */
class About extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date', 'updated_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_date'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'info', 'status'], 'required'],
            [['info'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['status'], 'integer'],
            [['title', 'main_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'main_image' => 'Main Image',
            'info' => 'Info',
            'created_date' => 'Created Date',
            'updated_date' => 'Updated Date',
            'status' => 'Status',
        ];
    }

    public function beforeDelete()
    {
        $models = NewsLang::find()->filterWhere(['parent' => $this->id])->all();

        foreach($models as $model) {

            StaticFunctions::deleteImage($model->main_image, $model->parent);

            $model->delete();
        }

        StaticFunctions::deleteImage($this->main_image, $this->id);
        StaticFunctions::deleteImage($this->secondary_image, $this->id);
        StaticFunctions::deleteImage($this->icon, $this->id);

        return parent::beforeDelete();
    }
}
