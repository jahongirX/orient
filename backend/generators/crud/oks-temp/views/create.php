<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

echo "<?php\n";

?>

use yii\helpers\Html;

$this->title = Yii::t('main', <?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>);
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container-fluid container-fixed-lg m-t-20">

    <div class="panel panel-transparent">

        <div class="panel-body no-padding">
            <div class="panel panel-default">

                <div class="panel-body page-header-block">

                    <h2><?= "<?= " ?>Html::encode($this->title) ?></h2>

                </div>

            </div>

        </div>

        <div class="panel-body no-padding row-default">

            <div class="row">

                <div class="tab-content">

                    <?= "<?= " ?> $this->render('_form', [
                        'model' => $model,
                        'id' => 1
                    ]) ?>

                </div>

            </div>
        </div>

    </div>

</div>
