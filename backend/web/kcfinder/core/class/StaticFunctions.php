<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 12/7/16
 * Time: 1:55 PM
 */


class StaticFunctions {

    public static function makeImage($image) {
        $new_image = new Picture($image);
        if($new_image->image_width > Yii::$app->params['image_width'])
            $new_image->imageresizewidth(Yii::$app->params['image_width']);
        if($new_image->image_height > Yii::$app->params['image_height'])
            $new_image->imageresizeheight(Yii::$app->params['image_height']);

        $new_image->imagesave($new_image->image_type, $image);
        $new_image->imageout();
    }

}
