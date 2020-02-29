<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>JACO | <?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>

<?php $this->beginBody() ?>

<body class="fixed-header menu-behind">

    <nav class="page-sidebar" data-pages="sidebar">

        <div class="sidebar-header">
            <div class="sidebar-header-controls">
                <button type="button" class="btn btn-link visible-lg-inline m-l-60" data-toggle-pin="sidebar"><i class="fa fs-12"></i></button>
            </div>
        </div>

        <div class="sidebar-menu">
            <?php
                if (!Yii::$app->user->isGuest) {
                    $menuItems = [
                        ['label' => Yii::t('main', 'Home'), 'icon' => 'pg-home', 'url' => '/site/index']
                    ];
                    $menuItems[] = ['label' => Yii::t('main', 'Newses'), 'icon' => 'pg-layouts', 'items' => [
                        ['label' => Yii::t('main', 'All News'), 'url' => '/news/index', 'icon' => 'NS'],
                        ['label' => Yii::t('main', 'News Categories'), 'url' => '/news-category/index', 'icon' => 'NC']
                    ]];
                    $menuItems[] = ['label' => Yii::t('main', 'Content'), 'icon' => 'pg-layouts', 'items' => [
                        ['label' => Yii::t('main', 'Pages'), 'url' => '/page/index', 'icon' => 'Ст'],
                        ['label' => Yii::t('main', 'Posts'), 'url' => '/post/index', 'icon' => 'По'],
                        ['label' => Yii::t('main', 'Categories'), 'url' => '/post-category/index', 'icon' => 'Кг'],
//                        ['label' => Yii::t('main', 'FAQ'), 'url' => '/faq/index', 'icon' => 'Fq'],
                        ['label' => Yii::t('main', 'Баннеры'), 'url' => '/advertise/index', 'icon' => 'Ad'],
                        ['label' => Yii::t('main', 'Menu'), 'url' => '/menu/index', 'icon' => 'ME'],
//                        ['label' => Yii::t('main', 'Partners'), 'url' => '/partner/index', 'icon' => 'PA'],
//                        ['label' => Yii::t('main', 'Books'), 'url' => '/books/index', 'icon' => 'BK'],
                    ]];
//                    $menuItems[] = ['label' => Yii::t('main', 'Services'), 'icon' => 'pg-settings_small_1', 'items' => [
//                        ['label' => Yii::t('main', 'Services'), 'url' => '/services/index', 'icon' => 'Se'],
//                        ['label' => Yii::t('main', 'Service Categories'), 'url' => '/service-category/index', 'icon' => 'SK'],
//                        ['label' => Yii::t('main', 'Service Requests'), 'url' => '/service-request/index', 'icon' => 'SR'],
//                        ['label' => Yii::t('main', 'Request Subjects'), 'url' => '/service-request-subject/index', 'icon' => 'SS'],
//                    ]];
//                    $menuItems[] = ['label' => Yii::t('main', 'Testimonials'), 'url' => '/testimonials/index', 'icon' => 'pg-comment'];
                    $menuItems[] = ['label' => Yii::t('main', 'Contacts'), 'icon' => 'pg-layouts', 'items' => [
                        ['label' => Yii::t('main', 'Contacts'), 'url' => '/contact/index', 'icon' => 'Ст'],
                    ]];
//                    $menuItems[] = ['label' => Yii::t('main', 'Virtual Reception'), 'icon' => 'pg-layouts', 'items' => [
//                        ['label' => Yii::t('main', 'Admission'), 'url' => '/admission/index', 'icon' => 'AD'],
//                        ['label' => Yii::t('main', 'Appeals of citizens'), 'url' => '/reception/index', 'icon' => 'RE'],
//                    ]];
                    $menuItems[] = ['label' => Yii::t('main', 'Gallery'), 'icon' => 'pg-camera', 'items' => [
                        ['label' => Yii::t('main', 'Albums'), 'url' => '/album/index', 'icon' => 'Фа'],
                        ['label' => Yii::t('main', 'Images'), 'url' => '/image/index', 'icon' => 'Фо']
                    ]];
                    $menuItems[] = ['label' => Yii::t('main', 'Settings'), 'icon' => 'pg-settings', 'items' => [
                        ['label' => Yii::t('main', 'Users'), 'url' => '/user/index', 'icon' => 'П'],
//                        ['label' => Yii::t('main', 'Subscribers'), 'url' => '/email/index', 'icon' => 'П'],
                        ['label' => Yii::t('main', 'Main Settings'), 'url' => '/settings/index', 'icon' => 'ОС'],
                        ['label' => Yii::t('main', 'Edit Language'), 'url' => '/source-message/index', 'icon' => 'РЯ']
                    ]];
                    $menuItems[] = ['label' => Yii::t('main', 'Telegram'), 'icon' => 'pg-settings', 'items' => [
                        ['label' => Yii::t('main', 'Main Settings'), 'url' => '/telegram/index', 'icon' => 'ОС'],
                        ['label' => Yii::t('main', 'Users'), 'url' => '/telegram-user/index', 'icon' => 'П'],
                    ]];
                }
            ?>
            <?= \backend\components\MenuWidget::widget(['items' => $menuItems]) ?>

            <div class="clearfix"></div>

        </div>

    </nav>

    <div class="page-container">

        <div class="header">
            <div class="container-fluid relative">
                <div class="pull-left full-height visible-sm visible-xs">
                    <div class="header-inner">
                        <a href="#" class="btn-link toggle-sidebar visible-sm-inline-block visible-xs-inline-block padding-5" data-toggle="sidebar">
                        <span class="icon-set menu-hambuger"></span>
                        </a>
                    </div>
                </div>
                <div class="pull-center hidden-md hidden-lg">
                    <div class="header-inner">
                        <div class="brand inline">JACO</div>
                    </div>
                </div>
            </div>

            <div class=" pull-left sm-table hidden-xs hidden-sm">
                <div class="header-inner">
                    <div class="brand inline">JACO</div>
                    <ul class="notification-list no-margin hidden-sm hidden-xs b-grey b-l b-r no-style p-l-30 p-r-20">
                        <li class="p-r-15 inline">
                            <?= Html::a('', Yii::$app->params['frontend'], ['class' => 'icon-set clip', 'data-toggle' => 'tooltip', 'data-original-title' => Yii::t('main', 'Go to the site'), 'data-placement' => 'bottom', 'target' => '_blank']) ?>
                        </li>
                    </ul>
                </div>
            </div>

            <div class=" pull-right">
                <div class="visible-lg visible-md m-t-10">
                    <div class="pull-left p-r-10 p-t-10 fs-16 font-heading">
                        <span class="semi-bold"></span>
                        <span class="text-master"> <?= Yii::$app->user->identity->username; ?> </span>
                    </div>

                    <div class="dropdown pull-right">
                        <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="thumbnail-wrapper d32 circular inline m-t-5">
                                <img src="/img/b2x.jpg" alt="" width="32" height="32">
                            </span>
                        </button>
                        <ul class="dropdown-menu profile-dropdown" role="menu">
                            <li>
                                <a href="/user/update/<?= Yii::$app->user->id ?>"><i class="pg-settings_small"></i> <?= Yii::t('main', 'Settings') ?></a>
                            </li>
                            <li class="bg-master-lighter">
                                <a href="/site/logout" class="clearfix">
                                    <span class="pull-left"><?= Yii::t('main', 'Logout') ?></span>
                                    <span class="pull-right"><i class="pg-power"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content-wrapper">

            <div class="content">

                <?php

                    if(isset($this->params['breadcrumbs'])){

                ?>

                        <div class="jumbotron" data-pages="parallax">
                            <div class="container-fluid container-fixed-lg sm-p-l-20 sm-p-r-20">
                                <div class="inner">

                                    <?= Breadcrumbs::widget([
                                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                        'homeLink'=> [
                                            'label' => 'Главный',
                                            'url' => '/site/index',
                                            'template' => '<li><p>{link}</p></li>'
                                        ],
                                    ]) ?>

                                </div>
                            </div>
                        </div>

                <?php

                    }

                ?>

                <?= $content ?>

                <div class="container-fluid container-fixed-lg"></div>

            </div>

            <div class="container-fluid container-fixed-lg footer">
            </div>

        </div>

    </div>

    <div class="modal fade stick-up" id="postRemoveModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                        <h5><?=Yii::t('main', 'Do you Really wont to remove this post?')?></h5>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" class="postID" value="">
                        <input type="hidden" class="postType" value="">
                        <button type="button" class="btn btn-primary btn-cons  pull-left inline rmSubmit"><?=Yii::t('main', 'Delete')?></button>
                        <button type="button" class="btn btn-default btn-cons no-margin pull-left inline" data-dismiss="modal"><?=Yii::t('main', 'Cancel')?></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade slide-down stick-up disable-scroll" id="postImageModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content-wrapper">
                <div class="modal-content">
                    <div class="modal-header clearfix text-left">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="pg-close fs-14"></i></button>
                        <h5 class="postTitle"></h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="clearfix">
                                    <img class="postImageBox img-responsive center-block" style="width: 100%" src="<?= Yii::$app->params['frontend']?>/images/default/l_post.jpg"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
