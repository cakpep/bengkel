<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisMotor */

$this->title = 'Update Jenis Motor: ' . ' ' . $model->id_jenis;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Motors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_jenis, 'url' => ['view', 'id_jenis' => $model->id_jenis, 'nama_jenis' => $model->nama_jenis]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-motor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
