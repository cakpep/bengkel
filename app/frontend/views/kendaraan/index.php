<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipeKendaraanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipe Kendaraans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipe-kendaraan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipe Kendaraan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_tipe',
            'nama_tipe',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
