<?php
/**
 * Created by PhpStorm.
 * User: Professor
 * Date: 13.12.2016
 * Time: 18:40
 */

namespace backend\models;

use common\models\Reception;
use Yii;
use yii\base\Model;

/**
 * ReceptionForm is the model behind the Reception form.
 */
class ReceptionDoneForm extends Model
{
    public $id;
    public $text;
    public $email;
    public $subject;
    public $message;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['text', 'required'],
            ['text', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'text' => 'Javob matni',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target email address
     * @return bool whether the email was sent
     */
    public function sendEmail()
    {
        return Yii::$app->mailer->compose()
            ->setTo($this->email)
            ->setFrom([Yii::$app->params['adminEmail'] => "Support"])
            ->setSubject($this->subject)
            ->setTextBody($this->message)
            ->send();
    }

    public function save(){
        $model = Reception::findOne($this->id);
        $model->reply_time = time();
        $model->reply_text = $this->text;
        $model->reply_by = Yii::$app->user->id;
        $model->status = Reception::STATUS_DONE;
        if($model->save(false)){
            return true;
        } else {
            return false;
        }
    }
}
