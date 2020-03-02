<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('main', 'Create Source Message');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Source Messages'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<?php $form = ActiveForm::begin(['action' => ['/source-message/index/']]); ?>


    <div class="container-fluid container-fixed-lg m-t-20">

        <div class="panel panel-transparent">

            <div class="panel-heading no-padding">
                <div class="panel panel-default">
                    <div class="panel-body page-header-block">
                        <h2><?= Html::encode($this->title) ?></h2>
                    </div>
                </div>
            </div>

            <div class="panel-body no-padding row-default">

                <div class="panel panel-default">

                    <div class="panel-body">

                        <div class="form-group required">
                            <label class="control-label" for="newWord"><?=Yii::t('main', 'New word')?></label>
                            <textarea id="newWord" class="form-control" name="newWord" rows="3" aria-required="true"></textarea>
                        </div>

                        <div class="form-group required">
                            <label class="control-label" for="ru">РУССКИЙ</label>
                            <textarea id="ru" class="form-control" name="ru" rows="3" aria-required="true"></textarea>
                        </div>

                        <div class="form-group required">
                            <label class="control-label" for="uz">O'ZBEKCHA</label>
                            <textarea id="uz" class="form-control" name="uz" rows="3" aria-required="true"></textarea>
                        </div>

                        <div class="form-group required">
                            <label class="control-label" for="en">ENGLISH</label>
                            <textarea id="en" class="form-control" name="en" rows="3" aria-required="true"></textarea>
                        </div>

                    </div>

                </div>

                <?= Html::submitButton(Yii::t('main', 'Create'), ['class' => 'btn btn-success']) ?>

            </div>

        </div>

    </div>

<?php ActiveForm::end(); ?>