<?php

use yii\helpers\Html;

$this->title = Yii::t('main', 'Page not found');

$this->params['breadcrumbs']['title'] = $this->title;

?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">

            <div class="panel panel-default alert-danger">

                <div class="panel-body page-header-block">

                    <h2><?= Html::encode($this->title) ?></h2>

                </div>
            </div>
        </div>

    </div>

</div>