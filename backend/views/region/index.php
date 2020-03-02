<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('main', Yii::t('main', 'Regions'));
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?= Html::encode($this->title) ?></h2>

                    <?= Html::a(Yii::t('main', 'Create Region'), ['/region/create'], ['class' => 'btn btn-success']) ?>

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

                        <? \yii\widgets\ActiveForm::begin(['action' => '/region/index']);?>
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