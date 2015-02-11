<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EventosForm */

$this->title = 'Actualizar Evento: ' . ' ' . $model->Codigo_evento;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Codigo_evento, 'url' => ['view', 'id' => $model->Codigo_evento]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="eventos-form-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
