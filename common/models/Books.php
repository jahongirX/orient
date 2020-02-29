<?php

namespace common\models;

use common\components\StaticFunctions;
use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property string $file
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['title', 'description', 'image'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'zip, doc,pdf,djvu,docx,rar'],
            [['status'], 'integer']
        ];
    }

    public function getBooksLang(){
        return $this->hasMany(BooksLang::className(),['parent'=>'id']);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Yii::t('main','Title'),
            'description' => Yii::t('main','Description'),
            'image' => Yii::t('main','Image'),
            'file' => Yii::t('main','File'),
        ];
    }

    public function beforeDelete(){

        foreach($this->booksLang as $c)
            $c->delete();

        StaticFunctions::deleteImage($this->image, $this->id,'books');
        StaticFunctions::deleteFile($this->file, $this->id,'books');

        return parent::beforeDelete();
    }
}
