<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "partner_lang".
 *
 * @property integer $id
 * @property integer $parent
 * @property integer $lang
 * @property string $title
 */
class PartnerLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partner_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent', 'lang', 'title'], 'required'],
            [['parent', 'lang'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent' => 'Parent',
            'lang' => 'Lang',
            'title' => Yii::t('main','Title'),
        ];
    }
}
