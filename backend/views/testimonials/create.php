<?php

use yii\helpers\Html;


$this->title = Yii::t('main', 'Create Testimonial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Testimonials'), 'url' => ['index']];
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

        <div class="panel-body no-padding row-default">

            <div class="row">
			    <?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>
			</div>
		</div>
	</div>
</div>
