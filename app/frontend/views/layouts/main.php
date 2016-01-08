<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
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
	
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => 'BENGKEL JAYA AUTO',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse ',//navbar-fixed-top',
				],
				'innerContainerOptions'=>[
						'class'=>'container-fluid',
				]
            ]);
            $menuItems = [
				['label' => 'About', 'items'=>[
					['label' => 'About', 'url' => ['/site/about']],
				]],
			];
            if (Yii::$app->user->isGuest) { // jika user belum login
                $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else { // jika sudah login
			
                $menuItems[] = [
                    'label' => 'Logout(' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
				
            ]);
            NavBar::end();
        ?>

        <div class="container-fluid">
			<div class='col-md-2'>
			 <ul class="list-group">
			 <li class="list-group-item"><?= Html::a('<i class="glyphicon glyphicon-home"></i> Home', ['/site'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
			 <li class="list-group-item"><?= Html::a('<i class="glyphicon glyphicon-user"></i> Pelanggan', ['/pelanggan'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
			 <li class="list-group-item"><?= Html::a('<i class="glyphicon glyphicon-wrench"></i> Pegawai', ['/pegawai'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
			 <li class="list-group-item"><?= Html::a('<i class="glyphicon glyphicon-shopping-cart"></i> Produk', ['/produk'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
			<li class="list-group-item"><?= Html::a('<i class="glyphicon glyphicon-folder-open"></i> Supplier', ['/supplier'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
			<li class="list-group-item"><?= Html::a('<i class="glyphicon glyphicon-usd"></i> Transaksi Pembelian', ['/transaksi-beli'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
			<li class="list-group-item"><?= Html::a('<i class="glyphicon glyphicon-print"></i> Laporan', ['/transaksi'], ['class' => 'btn btn-sm btn-primary btn-block']) ?></li>
			</ul>
			</div>
			<div class='col-md-10'>
			
				<?= Breadcrumbs::widget([
					'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
				]) ?>
				<?= Alert::widget() ?>
				<?= $content ?>
			</div>
		</div>
    </div>

    <footer class="footer">
        <div class="container-fluid">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
        <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
