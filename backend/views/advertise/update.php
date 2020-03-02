<?php

use common\components\StaticFunctions;
use yii\helpers\Html;

$this->title = Yii::t('main', 'Update Advertise');
$this->params['breadcrumbs'][] = ['label' => Yii::t('main', 'Advertises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => StaticFunctions::getPartOfText( $model->name, 50 ), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';

$session = Yii::$app->session;

if( $session->has('tab') ) {

    $tab = $session->get( 'tab' );

} else {

    $tab = 0;
    $session->set( 'tab', 0 );

}

$langs = [];

$langs[] = [
    'id' => Yii::$app->params['main_language_id'],
    'label' => Yii::t('main','На основном языке').' (' . Yii::$app->params['main_language'] . ')',
    'content' => $this->render('_form', [
        'id' => Yii::$app->params['main_language_id'],
        'model' => $model,
        'name' => Yii::$app->params['main_language'],
    ]),
    'active' => $tab == 0 ? 'active' : '',
];

$languages = \common\models\Languages::find()->where('status>-1 AND NOT abb="' . Yii::$app->params['main_language'] . '"')->all();

foreach($languages as $language)
{
    $lang_model = \common\models\AdvertiseLang::find()->andFilterWhere(['parent' => $model->id, 'lang' => $language->id])->one();

    if (empty($lang_model) || $lang_model == NULL) {

        $lang_model = new \common\models\AdvertiseLang();
        $action = "/advertise-lang/create";

    } else {

        $lang_model = \common\models\AdvertiseLang::findOne($lang_model->id);
        $action = "/advertise-lang/update/" . $lang_model->id;

    }

    $lang_model->parent = $model->id;
    $lang_model->lang = $language->id;

    $langs[] = [
        'id' => $language->id,
        'label' => $language->name,
        'content' => $this->render('/advertise-lang/_form', [
            'id' => $language->id,
            'model' => $lang_model,
            'action' => $action,
        ]),
        'active' => $tab == $language->id ? 'active' : ''
    ];

}

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

                    <div class="col-md-12">

                        <div class="panel panel-default">
                            <ul class="nav nav-tabs nav-tabs-simple hidden-xs" role="tablist" data-init-reponsive-tabs="collapse">
                                <?php

                                foreach($langs as $lang){

                                    ?>

                                    <li class="<?=$lang['active']?>">
                                        <a href="#lang_<?=$lang['id']?>" data-toggle="tab"><?=$lang['label']?></a>
                                    </li>

                                    <?php

                                }

                                ?>
                            </ul>

                        </div>

                    </div>

                    <div class="tab-content">
                        <?php

                        foreach($langs as $lang){

                            ?>

                            <div class="tab-pane <?=$lang['active']?>" id="lang_<?=$lang['id']?>">
                                <div class="row column-seperation">

                                    <?=$lang['content'];?>

                                </div>
                            </div>

                            <?php

                        }

                        ?>

                    </div>

                </div>

            </div>
        </div>
    </div>

<?php $session->set('tab',0); ?>