<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('main', 'Update Source Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->message, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('main', 'Update Source Message');

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<? $id = $model->id;?>
<?  $models = \backend\models\Message::findAll($id);  ?>

<?php $form = ActiveForm::begin(['action' => ['/source-message/save/' . $id]]); ?>


<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-heading no-padding">
            <div class="panel panel-default">
                <div class="panel-body page-header-block">
                    <h2><?= Html::encode($this->title) ?>: <?=$model->message?></h2>
                </div>
            </div>
        </div>

        <div class="panel-body no-padding row-default">

            <div class="panel panel-default">

                <div class="panel-body">


                    <div class="form-group required">
                        <label class="control-label" for="source_message">СООБЩЕНИЕ</label>
                        <textarea id="source_message" class="form-control" name="source_message" rows="3" aria-required="true"><?=$model->message;?></textarea>
                        <div class="help-block"></div>
                    </div>

                    <div class="form-group required">
                        <label class="control-label" for="ru">РУССКИЙ</label>
                        <textarea id="ru" class="form-control" name="ru" rows="3" aria-required="true"><?=$models[1]->translation;?></textarea>
                        <div class="help-block"></div>
                    </div>

                    <div class="form-group required">
                        <label class="control-label" for="uz">O'ZBEKCHA</label>
                        <textarea id="uz" class="form-control" name="uz" rows="3" aria-required="true"><?=$models[2]->translation;?></textarea>
                        <div class="help-block"></div>
                    </div>

                    <div class="form-group required">
                        <label class="control-label" for="en">ENGLISH</label>
                        <textarea id="en" class="form-control" name="en" rows="3" aria-required="true"><?=$models[0]->translation;?></textarea>
                        <div class="help-block"></div>
                    </div>

                </div>

            </div>

            <?= Html::submitButton(Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

        </div>

    </div>

</div>

<?php ActiveForm::end(); ?>

<script type="text/javascript">
    // var editor = CKEDITOR.replace( 'ru');
    // var editor1 = CKEDITOR.replace( 'uz');
    // var editor2 = CKEDITOR.replace( 'en');
</script>