<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProdukDetail */

$this->title = 'Create Produk Detail';
$this->params['breadcrumbs'][] = ['label' => 'Produk Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produk-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
