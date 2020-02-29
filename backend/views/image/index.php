<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\helpers\ArrayHelper;

$this->title = Yii::t('main', 'Images');
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/plugins/bootstrap-select2/select2.min.js',['depends' => [\yii\web\JqueryAsset::className()]]);

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?= Html::encode($this->title) ?></h2>

                    <?= Html::a(Yii::t('main', 'Upload Images'), ['/image/create'], ['class' => 'btn btn-success']) ?>

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
                                    'attribute' => 'name',
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                ],
                                [
                                    'attribute' => 'album',
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                    'filter' => Html::activeDropDownList($searchModel, 'album', Arrayhelper::map(\common\models\Album::find()->where('status>-1')->orderBy('id')->asArray()->all(), 'id', 'name'),['class'=>'full-width', 'data-init-plugin' => 'select2','prompt' => Yii::t('main', 'Select Album')]),
                                    'content' => function($model)
                                    {
                                        return $model->albumName->name;
                                    }
                                ],
                                [
                                    'label' => Yii::t('main', 'Image'),
                                    'headerOptions' => ['style' => 'min-width:120px;max-width:120px;width:120px'],
                                    'content' => function($model)
                                    {
                                        if($model->guid && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'album' . '/' . $model->album . '/s_' . $model->guid) )
                                        {

                                            return '<img class="img-responsive postImage" data-title="' . $model->name . '" data-img="' . Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album' . '/' . $model->album . '/l_' . $model->guid . '" src="' . Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'album' . '/' . $model->album . '/s_' . $model->guid . '"/>';

                                        } else {

                                            return '<img class="img-responsive"src="' . Yii::$app->params['frontend'] . '/images/default/s_post.jpg"/>';

                                        }
                                    },
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
	                                                    <a href="/{$controller}/update/{$model->id}" class="btn btn-complete"><i class="fa fa-pencil"></i></a>
	                                                    <a id="{$controller}{$model->id}" data-postID="{$model->id}" data-postType="{$controller}" class="btn btn-danger postRemove"><i class="fa fa-trash"></i></a>
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

                        <? \yii\widgets\ActiveForm::begin(['action' => '/image/index']);?>
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
