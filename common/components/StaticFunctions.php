<?php

namespace common\components;

use common\models\Languages;
use yii\helpers\FileHelper;
use common\components\ImageResize;
use common\models\Settings;
use Yii;

class StaticFunctions {

    public static function saveImage($FILE, $POST_ID, $POST_TYPE = 'post', $CROP_LARGE = true )
    {

        if( !empty( $FILE ) ) {

            $EXT = $FILE->extension == 'php' || $FILE->extension == 'js' ? 'file' : $FILE->extension;
            $DIR = realpath(dirname(__FILE__)) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';
            $FILENAME = md5(time() . Yii::$app->user->id . $FILE->name . rand(1, 1000000) . rand(1, 1000000)) . '.' . $EXT;
            
            FileHelper::createDirectory( $DIR );

            if($FILE->saveAs( $DIR . 'l_' . $FILENAME)) {

                $image = new ImageResize( $DIR . 'l_' . $FILENAME );

                if($CROP_LARGE == true)
                {
                    $image
                        ->resizeToBestFit(Yii::$app->params['large_image']['width'], Yii::$app->params['large_image']['height'])
                        ->save($DIR . 'l_' . $FILENAME);
                }

                $image
                    ->resizeToWidth(Yii::$app->params['medium_image']['width'])
                    ->save( $DIR . 'm_' . $FILENAME)

                    ->crop(Yii::$app->params['small_image']['width'], Yii::$app->params['small_image']['height'])
                    ->save( $DIR . 's_' . $FILENAME);

                return $FILENAME;

            }
        }

        return '';

    }

    public static function saveFile($FILE, $POST_ID, $POST_TYPE = 'post' )
    {

        if( !empty( $FILE ) && !($FILE->extension == 'php' || $FILE->extension == 'js')) {

            $DIR = realpath(dirname(__FILE__)) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';
            $FILENAME = $FILE->name;

            FileHelper::createDirectory( $DIR );

            if($FILE->saveAs( $DIR  . $FILENAME)) {

                return $FILENAME;

            }
        }

        return '';

    }

    public static function deleteFile( $FILENAME, $POST_ID, $POST_TYPE = 'post' )
    {
        $DIR = realpath( dirname( __FILE__ ) ) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';
        $DIR = $DIR . $FILENAME;
        if( !is_dir( $DIR) && file_exists( $DIR) )
            unlink( $DIR );
    }

    public static function deleteImage( $FILENAME, $POST_ID, $POST_TYPE = 'post' )
    {

        $DIR = realpath( dirname( __FILE__ ) ) . '/../../' . Yii::$app->params['uploads_dir'] . '/' . $POST_TYPE . '/' . $POST_ID . '/';

        $LARGE = $DIR . '/l_' . $FILENAME;
        $MEDIUM = $DIR . '/m_' . $FILENAME;
        $SMALL = $DIR . '/s_' . $FILENAME;

        if( !is_dir( $LARGE ) && file_exists( $LARGE ) )
            unlink( $LARGE );

        if( !is_dir( $MEDIUM ) && file_exists( $MEDIUM ) )
            unlink( $MEDIUM );

        if( !is_dir( $SMALL ) && file_exists( $SMALL ) )
            unlink( $SMALL );
    }


    public static function getPartOfText($text, $limit)
    {
        $length = strlen($text);
        if($length > $limit) {
            $last = strrpos($text,' ',-1*($length - $limit));
            $text = substr($text,0,$last).' ...';
        }
        return $text;
    }

    public static function getLangId() {
        $lang = Yii::$app->language;
        $query = Languages::find()->filterWhere(['abb' => $lang]);
        if($query->exists() && $query->one()->abb != Yii::$app->params['main_language'])
            return $query->one()->id;

        return 0;
    }
    public static function kcfinder($text) {
        $replace = Yii::$app->params['backend'].'/kcfinder/upload/images/';
        $replace2 = Yii::$app->params['backend'].'/kcfinder/upload/files/';
        $result = str_replace('/kcfinder/upload/images/',$replace,$text);
        $result = str_replace('/kcfinder/upload/files/',$replace2,$result);
        return $result;
    }
    public static function getLangs()
    {
        $result = [];
//        $result []= Yii::$app->params['main_lang'];
        $langs = Languages::find()->where('status>-1')->all();
        foreach($langs as $lang) {
            $result []= ['abb' => $lang->abb, 'name' => $lang->name];
        }
        $array = [];
        foreach($result as $lang) {
            if($lang['abb'] == Yii::$app->language) {
                $array [] = ['abb' => $lang['abb'], 'name' => $lang['name']];
                break;
            }
        }
        foreach($result as $lang) {
            if($lang['abb'] != Yii::$app->language && $lang['abb']) {
                $array [] = ['abb' => $lang['abb'], 'name' => $lang['name']];
            }
        }
        return $array;
    }
    public static function getDate($d = false, $w = false)
    {
        $lang = Yii::$app->language;
        if($lang == 'uz' || $lang == 'ru' || $lang == 'en') {
            $month = $d === false ? date('n') : date('n', strtotime($d));
            $month = Yii::$app->params['month'][$lang][$month];
            $day = $d === false ? date('j') : date('j', strtotime($d));
            $year = $d === false ? date('Y') : date('Y', strtotime($d));
            $week = $d === false ? date('w') : date('w', strtotime($d));
            $week = Yii::$app->params['week'][$lang][$week];
            $date = $day.' '.$month.' '.$year;
            $date .= $w === false ? '' : ' '.$week;
            return $date;
        }

        return Yii::$app->formatter->asDate('now', 'php:d F H:i D');
    }

    public static function getSettings( $id = '' )
    {

        if( $id )
        {
            if ( Settings::findOne( $id ) )
            {
                return Settings::findOne( $id )->val;
            }

            return '';
        }

    }
}