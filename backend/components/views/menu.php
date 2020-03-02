<ul class="menu-items">

    <?php $first = true;

    foreach ($items as $item) {


        $class = $first ? 'm-t-30' : '';

        if (is_array($item) && array_key_exists('items', $item)) {
    	
            $items2 = $item['items']; 

            $bg = $open = $active = '';

            foreach ($items2 as $item2) {

                if(Yii::$app->request->url == $item2['url']){
					$bg = 'bg-success';
					$open = 'open';
					$active = 'active';
				}

            }
            ?>

            <li class="<?= $open ?> <?= $active ?> <?= $class ?> ">

            	<a>
            		<span class="title"><?= $item['label'] ?></span>
                	<span class="<?= $open ?> arrow"></span> 
                </a>

            	<span class="<?= $bg ?> icon-thumbnail"><i class="<?= $item['icon'] ?>"></i></span>

	            <ul class="sub-menu">

	                <?php
	                foreach ($items2 as $item2) {
	                    ?>
	                    <li class="">
	                        <a href="<?= $item2['url']?>"><?= $item2['label']?></a>
	                        <span class="icon-thumbnail"><?= $item2['icon'] ?></span>
	                    </li>

	                    <?php

	                } ?>

	            </ul>
            </li>

<?php   } else { 

			$bg = $active = '';

			if( Yii::$app->request->url == $item['url'] || ( Yii::$app->request->url == '/' && $item['url'] == '/site/index' )  ){
	            $bg = 'bg-success';
	            $active = 'active';
	        }
?>

            <li class="<?= $active ?> <?= $class ?>">
                <a href="<?= $item['url']?>">
                    <span class="title"><?= $item['label'] ?></span>
                </a>
                <span class="<?= $bg ?> icon-thumbnail"><i class="<?= $item['icon'] ?>"></i></span>
            </li>

        <?php 

    	}

        $first = false;
    }

    ?>
    
</ul>

