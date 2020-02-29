<?php

use common\models\Admission;
use common\models\Reception;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;

$this->title = Yii::t('main', 'Appeals of citizens');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?= Html::encode($this->title) ?></h2>

                </div>
            </div>
        </div>

        <div class="panel-body no-padding">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="table-responsive">

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'layout' => '{items}',
                            'tableOptions' => [
                                'class' => 'table table-hover table-striped table-bordered gridview-table'
                            ],
                            'columns' => [
                                [
                                    'headerOptions' => ['style' => 'min-width:55px;max-width:55px;width:55px'],
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                    'content' => function( $model ){
                                        return '<div class="checkbox check-success"><input class="post-check" type="checkbox" name="' . $model->id . '" id="checkbox' . $model->id . '"><label for="checkbox' . $model->id . '"></label></div>';
                                    }
                                ],
                                [
                                    'attribute'=>'uniqid',
                                    'label' => 'ID',
                                    'contentOptions' => ['style' => 'width:80px', 'class' => 'v-align-middle'],
                                    'content' => function($data){
                                        return Html::a($data->id, ['reception/view','id' => $data->id], ['title' => 'View','class'=>'no-pjax']);
                                    }
                                ],
                                [
                                    'attribute' => 'name',
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                ],
                                [
                                    'attribute'=>'time',
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                    'format'=>'datetime',
                                    'filter' => false,
                                ],

                                [
                                    'attribute' => 'admissionId',
                                    'label' => 'Kimga',
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                    'filter' => Html::activeDropDownList($searchModel, 'admissionId', ArrayHelper::map(\common\models\AdmissionLang::find()->orderBy('id')->asArray()->all(), 'admission_id', 'level_name'),['class'=>'full-width', 'data-init-plugin' => 'select2','prompt' => '']),
                                    'content' => function($model)
                                    {
                                        $to = Admission::findOne($model->admissionId);
                                        return '<span title="' . $to->name . '" data-toggle="tooltip">' . mb_substr($to->level_name, 0, 30) . '</span>';
                                    }
                                ],
                                [
                                    'attribute' => 'person_type',
                                    'contentOptions' => ['class' => 'v-align-middle', 'style' => 'min-width:180px;max-width:180px;width:180px;'],
                                    'filter' => Html::activeDropDownList($searchModel, 'person_type', [ 0 =>  Yii::t('main', Yii::$app->params['person_type'][0]), 1 => Yii::t('main', Yii::$app->params['person_type'][1])], ['class'=>'full-width', 'data-init-plugin' => 'select2','prompt' => Yii::t('main', 'Select Person type')]),
                                    'content' => function($data)
                                    {
                                        return $data->person_type == 0 ? Yii::t('main', Yii::$app->params['person_type'][0]) : Yii::t('main', Yii::$app->params['person_type'][1]);
                                    }
                                ],
                                [
                                    'attribute'=>'status',
                                    'format'=>'raw',
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                    'filter' => [Reception::STATUS_RECEIVED => Yii::t('main', 'Received'), Reception::STATUS_WORKING => Yii::t('main', 'In progress'), Reception::STATUS_DONE => 'Done'],

                                    'filter' => Html::activeDropDownList($searchModel, 'status', [Reception::STATUS_RECEIVED=>'Received', Reception::STATUS_WORKING => 'In progress', Reception::STATUS_DONE => 'Done'], ['class'=>'full-width', 'data-init-plugin' => 'select2','prompt' => Yii::t('main', 'Select Status')]),
                                    'contentOptions' => ['class' => 'v-align-middle text-center', 'style' => 'min-width:150px;max-width:150px;width:150px;'],
                                    'value' => function($data)
                                    {
                                        $out = "(empty)";
                                        if($data->status === Reception::STATUS_RECEIVED){
                                            $out = '<span class="label label-default">Received</span>';
                                        } else if($data->status === Reception::STATUS_WORKING){
                                            $out = '<span class="label label-primary">In progress</span>';
                                        } else if($data->status === Reception::STATUS_DONE){
                                            $out = '<span class="label label-success">Done</span>';
                                        }
                                        return $out;
                                    }
                                ],
                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => Yii::t('main', 'Actions'),
                                    'headerOptions' => ['style' => 'text-align:center'],
                                    'template' => '{buttons}',
                                    'contentOptions' => ['style' => 'min-width:150px;max-width:150px;width:150px', 'class' => 'v-align-middle'],
                                    'buttons' => [
                                        'buttons' => function ($url, $model) {
                                            $controller = Yii::$app->controller->id;
                                            $code = <<<BUTTONS
	                                                <div class="btn-group flex-center">
	                                                    <a href="/{$controller}/view/{$model->id}" class="btn btn-complete"><i class="fa fa-eye"></i></a>
	                                                    <a id="post{$model->id}" data-postID="{$model->id}" data-postType="{$controller}" class="btn btn-danger postRemove"><i class="fa fa-trash"></i></a>
	                                                </div>
BUTTONS;
                                            return $code;
                                        }

                                    ],
                                ],
                            ],
                        ]); ?>

                    </div>

                </div>

                <div class="row index-footer">
                    <div class="col-md-6">

                        <? \yii\widgets\ActiveForm::begin(['action' => '/reception/index']);?>
                        <input type="hidden" id="rm-input" name="rm-input">
                        <input type="submit" id="rm-checked-btn" class="btn" style="float:left" disabled value="Удалить выбранные">
                        <? \yii\widgets\ActiveForm::end(); ?>

                    </div>
                    <div class="col-md-6">

                        <?=\yii\widgets\LinkPager::widget(['pagination' => $dataProvider->pagination])?>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<hr/>

<div class="container-fluid container-fixed-lg m-t-40">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?=Yii::t('main', 'Manual Receptions')?></h2>

                </div>
            </div>
        </div>

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body">

                    <?=DetailView::widget([
                        'model' => $manualmodel,
                        'attributes' => [
                            'physic',
                            'legal',
                            'received',
                            'inProgress',
                            'done',
                            'startDate',
                            'endDate',
                            'updateDate',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>


