<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\components\StaticFunctions;

$this->title = StaticFunctions::getPartOfText( $model->name, 50 );
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'TTJ arizalar'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                        <h2><?=  Yii::t('main', 'TTJ ariza') ?> <?= Html::encode($this->title) ?></h2>


                    <?=  Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>

                </div>

            </div>

        </div>

        <div class="panel-body no-padding">

            <div class="panel panel-default">

                <div class="panel-body">

                    <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                            'id',
                                    'name',
                                    's_name',
                                    'f_name',
                                    [
                                        'label' => 'Kurs',
                                        'value' => function($data){
                                            return Yii::$app->params['courses'][$data->course];
                                        }
                                    ],
                                    [
                                        'label' => 'Guruh',
                                        'value' => function($data){
                                            return Yii::$app->params['groups'][$data->guruh];
                                        }
                                    ],
                                    'birth_date',
                                    [
                                        'label' => 'Viloyat',
                                        'value' => function($data){
                                            return \common\models\Region::findOne($data->region_id)->name;
                                        }
                                    ],
                                    [
                                        'label' => 'Tuman',
                                        'value' => function($data){
                                            return \common\models\District::findOne($data->district_id)->name;
                                        }
                                    ],
                                    [
                                        'label' => 'Jinsi',
                                        'value' => function($data){
                                            if(!$data->male){
                                                return 'Ayol';
                                            }else{
                                                return 'Erkak';
                                            }
                                        }
                                    ],
                                    'passport_serial',
                                    'passport_number',
                                    'address:ntext',
                                    'student_doc',
                                    'inn',
                            ],
                        ]) ?>

                </div>

            </div>

        </div>

    </div>

</div>
