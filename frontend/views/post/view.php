<?php

$this->title = \common\models\PostCategory::findOne($model->category)->getLang('name') . "-" . $model->getLang('title');


?>

<?php

if($model->main_image && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/l_' . $model->getLang('main_image') )) {

    $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'post/' . $model->id . '/l_' .  $model->getLang('main_image');

} else {

    $image = '/images/default/m_post.jpg';

}

?>

<div class="inner-page-banner-area" style="background-image: url('/img/featured/back.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1><?=$model->getLang('title')?></h1>
            <ul>
                <li><a href="<?=\yii\helpers\Url::home()?>"><?=Yii::t('main','home')?></a> -</li>
                <li><a href="<?=\yii\helpers\Url::to(['post/category','id'=>$model->category])?>"><?=\common\models\PostCategory::findOne($model->category)->getLang('name')?></a></li>
            </ul>
        </div>
    </div>
</div>

<div class="news-details-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                <div class="row news-details-page-inner">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <h2 class="title-default-left-bold-lowhight"><a href="#"><?=$model->getLang('title')?></a></h2>
                        <ul class="title-bar-high news-comments">
                            <li><a href="<?=\yii\helpers\Url::to(['post/by-cat','id'=>$model->category])?>"><i class="fa fa-tags" aria-hidden="true"></i><?=\common\models\PostCategory::findOne($model->category)->getLang('name')?></a></li>
                            <!--                            <li><a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i><span>(03)</span> Comments</a></li>-->
                        </ul>
                        <div>
                            <?=\common\components\StaticFunctions::kcfinder($model->getLang('body'))?>
                        </div>

                        <!--                        <div class="course-details-comments">-->
                        <!--                            <h3 class="sidebar-title">(4) Comments</h3>-->
                        <!--                            <div class="media">-->
                        <!--                                <a href="#" class="pull-left">-->
                        <!--                                    <img alt="Comments" src="img/course/16.jpg" class="media-object">-->
                        <!--                                </a>-->
                        <!--                                <div class="media-body">-->
                        <!--                                    <h3><a href="#">Greg Christman</a></h3>-->
                        <!--                                    <h4>Excellent course!</h4>-->
                        <!--                                    <p>Rimply dummy text of the printinwhen an unknown printer took eype and scramb relofeletogimply dummy and typesetting industry.</p>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div class="media">-->
                        <!--                                <a href="#" class="pull-left">-->
                        <!--                                    <img alt="Comments" src="img/course/17.jpg" class="media-object">-->
                        <!--                                </a>-->
                        <!--                                <div class="media-body">-->
                        <!--                                    <h3><a href="#">Lora Ekram</a></h3>-->
                        <!--                                    <h4>Excellent course!</h4>-->
                        <!--                                    <p>Rimply dummy text of the printinwhen an unknown printer took eype and scramb relofeletogimply dummy and typesetting industry.</p>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                            <div class="media">-->
                        <!--                                <a href="#" class="pull-left">-->
                        <!--                                    <img alt="Comments" src="img/course/18.jpg" class="media-object">-->
                        <!--                                </a>-->
                        <!--                                <div class="media-body">-->
                        <!--                                    <h3><a href="#">Mike Jones</a></h3>-->
                        <!--                                    <h4>Excellent course!</h4>-->
                        <!--                                    <p>Rimply dummy text of the printinwhen an unknown printer took eype and scramb relofeletogimply dummy and typesetting industry.</p>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <!--                        <div class="leave-comments">-->
                        <!--                            <h3 class="sidebar-title">Leave A Comment</h3>-->
                        <!--                            <div class="row">-->
                        <!--                                <div class="contact-form">-->
                        <!--                                    <form>-->
                        <!--                                        <fieldset>-->
                        <!--                                            <div class="col-sm-4">-->
                        <!--                                                <div class="form-group">-->
                        <!--                                                    <input type="text" placeholder="Name" class="form-control">-->
                        <!--                                                    <div class="help-block with-errors"></div>-->
                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!--                                            <div class="col-sm-4">-->
                        <!--                                                <div class="form-group">-->
                        <!--                                                    <input type="email" placeholder="Email" class="form-control">-->
                        <!--                                                    <div class="help-block with-errors"></div>-->
                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!--                                            <div class="col-sm-4">-->
                        <!--                                                <div class="form-group">-->
                        <!--                                                    <input type="text" placeholder="Website" class="form-control">-->
                        <!--                                                    <div class="help-block with-errors"></div>-->
                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!--                                            <div class="col-sm-12">-->
                        <!--                                                <div class="form-group">-->
                        <!--                                                    <textarea placeholder="Comment" class="textarea form-control" id="form-message" rows="8" cols="20"></textarea>-->
                        <!--                                                    <div class="help-block with-errors"></div>-->
                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!--                                            <div class="col-sm-12">-->
                        <!--                                                <div class="form-group margin-bottom-none">-->
                        <!--                                                    <button type="submit" class="view-all-accent-btn">Post Comment</button>-->
                        <!--                                                </div>-->
                        <!--                                            </div>-->
                        <!--                                        </fieldset>-->
                        <!--                                    </form>-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                    </div>
                </div>
            </div>

            <?= \frontend\widgets\Sidebar::widget();?>

        </div>
    </div>
</div>
