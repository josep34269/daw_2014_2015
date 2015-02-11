<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EventosForm */

$this->title = $model->Codigo_evento;
$this->params['breadcrumbs'][] = ['label' => 'Eventos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eventos-form-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->Codigo_evento], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->Codigo_evento], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Esta seguro de querer eliminar este evento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Codigo_evento',
            'Nombre_evento',
            'Email_evento:email',
            'Direccion_evento',
            'Telefono_evento',
            'Descripcion_evento',
            'Logo',
            'Portada',
            'Fecha_creacion',
            'Fecha_inicio',
            'Fecha_fin',
            'Numero_usuarios',
            'Cod_usuario',
        ],
    ]) ?>

</div>
