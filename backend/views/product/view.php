<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Posts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

	<div class="panel panel-transparent">

        <div class="panel-body no-padding">

			<div class="panel panel-default">

				<div class="panel-body page-header-block">

					<h2><?=Yii::t('main', 'Post') ?>: <?= Html::encode($this->title) ?></h2>

			        <?= Html::a(Yii::t('main', 'Delete'), ['delete', 'id' => $model->id], [
			            'class' => 'btn btn-danger',
			            'data' => [
			                'confirm' => Yii::t('main', 'Are you sure you want to delete this item?'),
			                'method' => 'post',
			            ],
			        ]) ?>

                    <?= Html::a(Yii::t('main', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

            	</div>
			</div>
		</div>

		<div class="panel-body no-padding">

			<div class="panel panel-default">

				<div class="panel-body">

					<?= DetailView::widget([
				        'model' => $model,
				        'attributes' => [
				        	'title',
				        	'second_title',
                            [
                                'attribute' => 'category',
                                'value' => function($model)
                                {
                                    return $model->categoryName->name;
                                }
                            ],
                            [
                                'label' => Yii::t('main', 'Image'),
                                'attribute' => 'main_image',
                                'format' => 'raw',
                                'value' => function($model){
                                    if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/s_' . $model->main_image ))
                                    {

                                        return '<img data-title="' . $model->title . '" data-img="' . Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/l_' . $model->main_image . '" class="postImage" src="' .  Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . Yii::$app->controller->id . '/' . $model->id . '/s_' . $model->main_image . '"/>';

                                    } else {

                                        return '<img src="' . Yii::$app->params['frontend'] . '/images/default/s_post.jpg"/>';

                                    }
                                },
                            ],
                        ],
				    ]) ?>

				</div>
			</div>
		</div>
	</div>
</div>
