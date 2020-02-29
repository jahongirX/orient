<?php

namespace common\models;

use Yii;
use common\components\StaticFunctions;

/**
 * This is the model class for table "image".
 *
 * @property integer $id
 * @property integer $album
 * @property string $name
 * @property string $guid
 * @property string $extension
 * @property integer $size
 * @property integer $creator
 * @property string $created_date
 * @property integer $status
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $upload_images = [];
    public static function tableName()
    {
        return 'image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['album', 'guid', 'size', 'creator', 'created_date', 'album'], 'required'],
            [['album', 'size', 'creator', 'status'], 'integer'],
            [['created_date'], 'safe'],
            [['name', 'guid'], 'string', 'max' => 100],
            [['extension'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('main', 'ID'),
            'album' => Yii::t('main', 'Album'),
            'name' => Yii::t('main', 'Name'),
            'guid' => Yii::t('main', 'Guid'),
            'extension' => Yii::t('main', 'Extension'),
            'size' => Yii::t('main', 'Size'),
            'creator' => Yii::t('main', 'Creator'),
            'created_date' => Yii::t('main', 'Created Date'),
            'status' => Yii::t('main', 'Status'),
        ];
    }

    public function getAlbumName()
    {
        return $this->hasOne(Album::className(), ['id' => 'album']);
    }

    public function beforeDelete()
    {
        StaticFunctions::deleteImage($this->guid, $this->id, 'image');

        return parent::beforeDelete();
    }
}
