<?php

$this->title = Yii::t('main', 'News');
$js = <<<JS
    window.onscroll = function() {myFunction()};

	// Get the header
	var header = document.getElementById("lower-menu");

	// Get the offset position of the navbar
	var sticky = header.offsetTop;

	// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
	function myFunction() {
	  if (window.pageYOffset > sticky) {
	    header.classList.add("sticky");
	    $('section.main-block').css('padding-top','66px');
	  } else {
	    header.classList.remove("sticky");
	    $('section.main-block').css('padding-top','0');
	  }
	}
JS;

$this->registerJs($js);


use common\models\Menu;

function renderSitemap($id){

    $out = '';
    $menu = Menu::find()->where('status=1')->andWhere(['id' => $id, 'type' => 0])->one();
    $_query = Menu::find()->where('status=1')->andWhere(['parent' => $id,'type' => 0]);

    if( $_query->exists() )
    {
        $out .= '<li> <a href="#"> <i class="fa fa-folder-open"></i> ';
        $out .= $menu->title . '</a>';
        $out .= '<ul class="map-dropdown">';
        $items = $_query->orderBy(['order_by' => SORT_ASC])->all();
        foreach ($items as $item){
            $submenu = Menu::find()->where(['parent'=>$item->id])->all();
            if(!empty($submenu)){
                $out .= '<li class="map-dropdown-li"><a href="#"> <i class="fa fa-folder-open"></i>' . $item->title .'</a><ul class="map-sub-dropdown">';
                foreach ($submenu as $subitem){
                    if($subitem->url != '/')
                        $out .= '<li><a href="'.$subitem->url.'"> <i class="fa fa-link"></i> '.$subitem->title.'</a></li>';
                    else
                        $out .= '<li><i class="fa fa-link"></i> '.$subitem->title.'</li>';
                }
                $out .= '</ul></li>';
            }else{
                if($item->url != '/')
                    $out .= '<li><a  href="'.$item->url. '"> <i class="fa fa-link"></i>' . $item->title .'</a></li>';
                else
                    $out .= '<li> <i class="fa fa-link"></i> ' . $item->title .'</li>';
            }


        }

        $out .= '</ul>';

    } else {

        if(!empty($menu->url))
            $out .= '<li><a href="' .$menu->url. '"> <i class="fa fa-link"></i> '.$menu->title.'</a></li>';
        else
            $out .= '<li><i class="fa fa-link"></i> '.$menu->title.'</li>';

    }

    return $out;

}
?>

<section class="main-block">

    <div class="container">

        <div class="row">

            <div class="col-md-9">

                <div class="news-block single-news row">

                    <h2 class="single__news-page-title"><?=Yii::t('main','Sayt xaritasi')?></h2>

                    <div class="single__news-page-info">

                    </div>

                    <div class="single__news-page-content sitemap">

                        <ul>
                        <?php

                        foreach ($models as $model) {

                            echo renderSitemap( $model->id );

                        }

                        ?>
                        </ul>
                    </div>

                </div>

            </div>

            <div class="col-lg-3 right-sidebar">

                <?= \frontend\widgets\Sidebar::widget();?>

            </div>

        </div>

    </div>

</section>
