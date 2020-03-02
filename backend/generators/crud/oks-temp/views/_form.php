<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

$model = new $generator->modelClass();
$safeAttributes = $model->safeAttributes();
if (empty($safeAttributes)) {
    $safeAttributes = $model->attributes();
}

echo "<?php\n";

?>

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="/ckfinder/ckfinder.js"></script>

<?= "<?php " ?>$form = ActiveForm::begin([
    'id' => 'create-form' . $id,
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'errorCssClass' => '',
    'options' => ['enctype' => 'multipart/form-data']
]); ?>

    <div class="col-md-8">

        <div class="panel panel-default">

            <div class="panel-body">

                <?php foreach ($generator->getColumnNames() as $attribute) {
                    if (in_array($attribute, $safeAttributes)) {

                        if (preg_match('/^(image|images)$/i', $attribute)) {

                            echo $generator->generateActiveField($attribute);

                        } else {

                            echo "                  <?= " . $generator->generateActiveField($attribute) . " ?>\n\n";

                        }
                    }
                } ?>

            </div>

        </div>

    </div>

    <div class="col-md-12">

        <?= "<?= " ?> Html::submitButton($model->isNewRecord ? Yii::t('main', 'Create') :  Yii::t('main', 'Update'), ['class' => 'btn btn-primary']) ?>

    </div>

<?= "<?php " ?>ActiveForm::end(); ?>
