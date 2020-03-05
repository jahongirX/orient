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
                <h3 class="text-center titler"><?=Yii::t('main','faq')?></h3>
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
                    <?php $count1 = 1; ?>

                    <?php foreach ($models as $model): ?>

                        <?php $question_answers = \common\models\QuestionAnswer::find()->where(['status'=>1, 'category'=>$model->id])->all();  ?>



                        <div class="tab-pane fade <?=($count1 == 1)?'show active':''; ?>" id="<?=$model->id?>" role="tabpanel" aria-labelledby="<?=$model->id?>-question">

                        <?php if (!empty($question_answers)): ?>

                            <?php foreach ($question_answers as $question_answer): ?>
                                    <div class="quest question1-1">
                                        <button class="btn " type="button" data-toggle="collapse" data-target="#Answer-<?=$question_answer->id ?>" aria-expanded="false" aria-controls="Answer-<?=$question_answer->id ?>">
                                            <p><?=$question_answer->question ?></p>
                                            <img src="images/tab-icon.png" alt="Tab icon">
                                        </button>


                                        <div class="collapse answer" id="Answer-<?=$question_answer->id ?>">
                                            <div class="card card-body">
                                                Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. При создании генератора мы использовали небезизвестный универсальный код речей.
                                            </div>
                                        </div>
                                    </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                        </div>
                        <?php $count1++ ?>

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
                <h3 class="text-center titler"><?=Yii::t('main','faq')?></h3>
            </div>
        </div>

        <div class="row questions-container">

            <div class="col-md-12 main">
                <div class="quest-main-btn">
                <?php if (!empty($models)): ?>
                    <?php foreach ($models as $model): ?>
                        <?php
                        if($model->img && file_exists(Yii::getAlias('@frontend') . '/web' . Yii::$app->params['uploads_url'] . 'question-category/' . $model->id . '/l_' . $model->img )) {

                            $image = Yii::$app->params['frontend'] . Yii::$app->params['uploads_url'] . 'question-category/' . $model->id . '/l_' .  $model->img;

                        } else {

                            $image = '/images/default/m_post.jpg';

                        }
                        ?>
                    <a class="quest-main-btn-a" data-pli="1" data-toggle="collapse" data-target="#question-body-<?=$model->id?>" aria-expanded="false" aria-controls="question-body-<?=$model->id?>">
                        <img src="<?=$image ?>" alt="Question1">
                        <p><?=$model->name ?></p>
                    </a>


                    <div class="collapse " id="question-body-<?=$model->id?>">

                        <div class="card card-body quest-body">

                            <?php $question_answers = \common\models\QuestionAnswer::find()->where(['status'=>1, 'category'=>$model->id])->all();  ?>
                            <?php foreach ($question_answers as $question_answer): ?>
                            <div class="quest question1-1">
                                <button class="btn " type="button" data-toggle="collapse" data-url="1-<?=$question_answers->id?>" data-target="#Answer1-<?=$question_answers->id?>" aria-expanded="false" aria-controls="Answer1-<?=$question_answers->id?>">
                                    <p><?=$question_answer->question ?></p>
                                    <img src="images/tab-icon.png" alt="Tab icon">
                                </button>

                                <div class="collapse answer" id="Answer1-<?=$question_answers->id?>">
                                    <div class="card card-body"><?=$question_answer->answer ?></div>
                                </div>

                            </div>
                            <?php endforeach; ?>


                        </div>

                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>




        </div>

    </div>
</section>
