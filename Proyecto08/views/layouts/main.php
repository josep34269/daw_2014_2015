<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="icon" href="favicon.png" sizes="16x16 32x32" type="image/png">
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'The Event',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Inicio', 'url' => ['/site/index']],
                    ['label' => 'Acerca de nosotros', 'url' => ['/site/about']],
                    ['label' => 'Contacto', 'url' => ['/site/contact']],
					Yii::$app->user->isGuest ?
						['label' => 'Registro', 'url' => ['/site/register']]  :
						['label' => '', 'url' => ''],
                    Yii::$app->user->isGuest ?
                        ['label' => 'Iniciar sesión', 'url' => ['/site/login']]  :
                        ['label' => 'Cerrar sesión (' . Yii::$app->request->cookies['usuario'] . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],
						
                ],
            ]);
			if(Yii::$app->user->isGuest){
			}
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p align="center""><?php echo Html::a(Html::img('../img/unete.png'),Url::toRoute('/site/index')); ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
