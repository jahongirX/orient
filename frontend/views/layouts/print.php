<?php

use yii\helpers\Html;

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

    <head>

        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>

    <body>

        <?php $this->beginBody() ?>

        <?= $content?>

        <script>

            var p = top;

            function readtxt()
            {
                if( p != null )
                    document.forms.mistake.url.value = p.loc;

                if( p != null )
                    document.forms.mistake.mis.value = p.mis;
            }

            function hide()
            {
                var win = p.document.getElementById('mistake');

                win.parentNode.removeChild(win);
            }
        </script>

        <?php $this->endBody() ?>

    </body>

</html>
<?php $this->endPage() ?>
