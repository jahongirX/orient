<?php

namespace frontend\widgets;

use common\models\News;
use yii\base\Widget;
use common\models\Menu;

class Footer extends Widget {

    public function run()
    {
        $models = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => 1])->orderBy(['order_by' => SORT_ASC])->all();
        $models2 = Menu::find()->where('status=1')->andWhere(['parent' => NULL,'type' => 2])->orderBy(['order_by' => SORT_ASC])->all();
        $news = News::find()->where(['status' => 1])->orderBy(['created_date' => SORT_ASC])->limit(2)->all();
        return $this->render('footer', [
            'models' => $models,
            'models2' => $models2,
            'news' => $news
        ]);
    }

}
