<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 26.02.2020
 * Time: 23:46
 */
?>
<section class="questions">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center titler">Часто задаваемые вопросы</h3>
            </div>
        </div>

        <div class="row questions-container">
            <div class="col-md-3 ">
                <div class="list-group" id="list-tab" role="tablist">

                    <?php if (!empty($models)): ?>
                    <?php $count = 1; ?>
                    <?php foreach ($models as $model): ?>
                            <?php
                            if($model->img && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'question-category/' . $model->id . '/l_' . $model->img )) {

                                $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'question-category/' . $model->id . '/l_' .  $model->img;

                            } else {

                                $image = '/images/default/m_post.jpg';

                            }
                            ?>

                            <a class="quest-main-btn-a <?=($count == 1)? 'active': ''; ?>" id="<?=$model->id?>-question" data-toggle="list" href="#<?=$model->id?>" role="tab" aria-controls="techniuqe">
                                <img src="<?=$image ?>" alt="Question1">
                                <p><?=$model->name ?></p>
                            </a>
                        <?php $count++ ?>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </div>
            </div>

            <div class="col-md-9">
                <?php if (!empty($models)): ?>

                <div class="tab-content" id="nav-tabContent">

                    <?php foreach ($models as $model): ?>

                        <div class="tab-pane fade show active" id="<?=$model->id?>" role="tabpanel" aria-labelledby="<?=$model->id?>-question">

                            <div class="quest question1-1">
                                <button class="btn " type="button" data-toggle="collapse" data-target="#Answer1-1" aria-expanded="false" aria-controls="Answer1-1">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer1-1">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endforeach; ?>

                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

    <!--///////////////////////////////////////////////////////////////////////////////////mobil-->
<section class="questions hidden-block-for-mobile">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center titler">Часто задаваемые вопросы</h3>
            </div>
        </div>

        <div class="row questions-container">

            <div class="col-md-12 main">
                <div class="quest-main-btn">

                    <a class="quest-main-btn-a" data-pli="1" data-toggle="collapse" data-target="#question-body-1" aria-expanded="false" aria-controls="question-body-1">
                        <img src="images/question1-icon.png" alt="Question1">
                        <p>Технические вопросы</p>
                    </a>


                    <div class="collapse " id="question-body-1">

                        <div class="card card-body quest-body">

                            <div class="quest question1-1">
                                <button class="btn " type="button" data-toggle="collapse" data-url="1-1" data-target="#Answer1-1" aria-expanded="false" aria-controls="Answer1-1">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>



                            </div>
                            <div class="collapse answer" id="Answer1-1">
                                <div class="card card-body">
                                    Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                </div>
                            </div>

                            <div class="quest question1-2">
                                <button class="btn " type="button" data-url="1-2" data-toggle="collapse" data-target="#Answer1-2" aria-expanded="false" aria-controls="Answer1-2">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer1-2">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question1-3">
                                <button class="btn " type="button" data-url="1-3" data-toggle="collapse" data-target="#Answer1-3" aria-expanded="false" aria-controls="Answer1-3">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer1-3">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question1-4">
                                <button class="btn " type="button" data-url="1-4" data-toggle="collapse" data-target="#Answer1-4" aria-expanded="false" aria-controls="Answer1-4">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer1-4">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question1-5">
                                <button class="btn " type="button" data-url="1-5" data-toggle="collapse" data-target="#Answer1-5" aria-expanded="false" aria-controls="Answer1-5">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer1-5">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12 main">
                <div class="quest-main-btn">

                    <a class="quest-main-btn-a" data-pli="2" data-toggle="collapse" data-target="#question-body-2" aria-expanded="false" aria-controls="question-body-2">
                        <img src="images/question2-icon.png" alt="Question2">
                        <p>Вопросы по доставке</p>
                    </a>


                    <div class="collapse " id="question-body-2">

                        <div class="card card-body quest-body">

                            <div class="quest question2-1">
                                <button class="btn " type="button" data-url="2-1" data-toggle="collapse" data-target="#Answer2-1" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer2-1">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question2-2">
                                <button class="btn " type="button" data-url="2-2" data-toggle="collapse" data-target="#Answer2-2" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer2-2">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question2-3">
                                <button class="btn " type="button" data-url="2-3" data-toggle="collapse" data-target="#Answer2-3" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer2-3">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question2-4">
                                <button class="btn " type="button" data-url="2-4" data-toggle="collapse" data-target="#Answer2-4" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer2-4">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question2-5">
                                <button class="btn " type="button" data-url="2-5" data-toggle="collapse" data-target="#Answer2-5" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer2-5">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12 main">
                <div class="quest-main-btn">

                    <a class="quest-main-btn-a" data-pli="3"  data-toggle="collapse" data-target="#question-body-3" aria-expanded="false" aria-controls="question-body-3">
                        <img src="images/question3-icon.png" alt="Question1">
                        <p>Вопросы по оплате</p>
                    </a>


                    <div class="collapse " id="question-body-3">

                        <div class="card card-body quest-body" >

                            <div class="quest question3-1">
                                <button class="btn " type="button" data-url="3-1" data-toggle="collapse" data-target="#Answer3-1" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer3-1">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question3-2">
                                <button class="btn " type="button" data-url="3-2" data-toggle="collapse" data-target="#Answer3-2" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer3-2">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question3-3">
                                <button class="btn " type="button" data-url="3-3" data-toggle="collapse" data-target="#Answer3-3" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer3-3">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question3-4">
                                <button class="btn " type="button" data-url="3-4" data-toggle="collapse" data-target="#Answer3-4" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer3-4">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question3-5">
                                <button class="btn " type="button" data-url="3-5" data-toggle="collapse" data-target="#Answer3-5" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer3-5">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12 main">
                <div class="quest-main-btn">

                    <a class="quest-main-btn-a" data-pli="4" data-toggle="collapse" data-target="#question-body-4" aria-expanded="false" aria-controls="question-body-4">
                        <img src="images/question4-icon.png" alt="Question1">
                        <p>Вопросы по договору</p>
                    </a>


                    <div class="collapse" id="question-body-4">

                        <div class="card card-body quest-body">

                            <div class="quest question4-1">
                                <button class="btn " type="button" data-url="4-1" data-toggle="collapse" data-target="#Answer4-1" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer4-1">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question4-2">
                                <button class="btn " type="button" data-url="4-2" data-toggle="collapse" data-target="#Answer4-2" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer4-2">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question4-3">
                                <button class="btn " type="button" data-url="4-3" data-toggle="collapse" data-target="#Answer4-3" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer4-3">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question4-4">
                                <button class="btn " type="button" data-url="4-4" data-toggle="collapse" data-target="#Answer4-4" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer4-4">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question4-5">
                                <button class="btn " type="button" data-url="4-5" data-toggle="collapse" data-target="#Answer4-5" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer4-5">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-12 main">
                <div class="quest-main-btn">

                    <a class="quest-main-btn-a" data-toggle="collapse" data-pli="5" data-target="#question-body-5" aria-expanded="false" aria-controls="question-body-5">
                        <img src="images/question5-icon.png" alt="Question1">
                        <p>Вопросы по срокам поставок</p>
                    </a>


                    <div class="collapse" id="question-body-5">

                        <div class="card card-body quest-body">

                            <div class="quest question5-1">
                                <button class="btn " type="button" data-url="5-1" data-toggle="collapse" data-target="#Answer5-1" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer5-1">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question5-2">
                                <button class="btn " type="button" data-url="5-2" data-toggle="collapse" data-target="#Answer5-2" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer5-2">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question5-3">
                                <button class="btn " type="button" data-url="5-3" data-toggle="collapse" data-target="#Answer5-3" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer5-3">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question5-4">
                                <button class="btn " type="button" data-url="5-4" data-toggle="collapse" data-target="#Answer5-4" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer5-4">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                            <div class="quest question5-5">
                                <button class="btn " type="button" data-url="5-5" data-toggle="collapse" data-target="#Answer5-5" aria-expanded="false" aria-controls="collapseExample">
                                    <p>Условный текст который придумал дизайнер для написания вороса</p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>


                                <div class="collapse answer" id="Answer5-5">
                                    <div class="card card-body">
                                        Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>
</section>
