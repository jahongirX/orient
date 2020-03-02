<?php

use yii\helpers\Html;

$this->title = 'Update Call Back: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Call Backs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

?>

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

			<div class="row">

			    <?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>

			</div>
		</div>
	</div>
</div>
