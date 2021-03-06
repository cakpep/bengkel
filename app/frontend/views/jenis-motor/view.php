<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisMotor */

$this->title = $model->id_jenis;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Motors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-motor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_jenis' => $model->id_jenis, 'nama_jenis' => $model->nama_jenis], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_jenis' => $model->id_jenis, 'nama_jenis' => $model->nama_jenis], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_jenis',
            'nama_jenis',
        ],
    ]) ?>

</div>
