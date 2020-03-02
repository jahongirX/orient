<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = Yii::t('main', 'TTJ ariza');
$this->params['breadcrumbs'][] = $this->title;

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
                                    'class' => 'yii\grid\SerialColumn',
                                    'contentOptions' => ['class' => 'v-align-middle'],
                                ],

//                                [
//                                                'attribute' => 'id',
//                                                'contentOptions' => ['class' => 'v-align-middle'],
//                                            ],
[
                                                'attribute' => 'name',
                                                'label' => 'Ism',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],
[
                                                'attribute' => 's_name',
                                                'label' => 'Familiya',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],
//[
//                                                'attribute' => 'f_name',
//                                                'contentOptions' => ['class' => 'v-align-middle'],
//                                            ],
[
                                                'attribute' => 'course',
                                                'label' => 'Kurs',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],
                                [
                                                'attribute' => 'guruh',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],

                                                [
                                                    'attribute' => 'status',
                                                    'value' => function($data){
                                                        switch ($data->status){
                                                            case -1: return '<span class="bg-danger" style="padding: 5px; color: #fff;">Inkor etildi</span>';
                                                            case 0: return '<span class="bg-info" style="padding: 5px;color: #fff;">Ko`rib chiqilmadi</span>';
                                                            case 1: return '<span class="bg-success" style="padding: 5px;color: #fff;">Qabul qilindi</span>';
                                                        }
                                                    },
                                                    'format' => 'html',
                                                    'contentOptions' => ['class' => 'v-align-middle'],
                                                ],
/*[
                                                'attribute' => 'country_id',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'region_id',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'district_id',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'male',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'passport_serial',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'passport_number',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'address',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'student_doc',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/
/*[
                                                'attribute' => 'inn',
                                                'contentOptions' => ['class' => 'v-align-middle'],
                                            ],*/

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
                                                    <a href="/{$controller}/view/{$model->id}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                                    <a id="{$controller}{$model->id}" data-postID="{$model->id}" data-postType="{$controller}" class="btn btn-danger postRemove"><i class="fa fa-trash"></i></a>
                                                </div>
BUTTONS;
                                            return $code;
                                        }

                                    ],
                                ],

                                [
                                    'class' => 'yii\grid\ActionColumn',
                                    'header' => Yii::t('main', 'Qo`shimcha amallar'),
                                    'headerOptions' => ['style' => 'text-align:center'],
                                    'template' => '{buttons}',
                                    'contentOptions' => ['style' => 'min-width:150px;max-width:150px;width:150px', 'class' => 'v-align-middle'],
                                    'buttons' => [
                                        'buttons' => function ($url, $model) {
                                            $controller = Yii::$app->controller->id;
                                            $code = <<<BUTTONS
                                                <div class="btn-group flex-center">
                                                    <a href="/{$controller}/accept/{$model->id}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                                    <a href="/{$controller}/disallow/{$model->id}" class="btn btn-warning"><i class="fa fa-remove"></i></a>
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

                        <?  \yii\widgets\ActiveForm::begin(['action' => '/'.Yii::$app->controller->id.'/index']);?>
                        <input type="hidden" id="rm-input" name="rm-input">
                        <input type="submit" id="rm-checked-btn" class="btn" style="float:left" disabled value="Удалить выбранные">
                        <?  \yii\widgets\ActiveForm::end(); ?>

                    </div>

                    <div class="col-md-6">

                        <?=  \yii\widgets\LinkPager::widget(['pagination' => $dataProvider->pagination])?>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

