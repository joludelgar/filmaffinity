<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\AlquilerForm */
/* @var $form ActiveForm */
/* @var $alquileres Alquiler[] */
$this->title = 'Busqueda';
$this->params['breadcrumbs'][] = $this->title;
$url = Url::to(['ajax']);
$urlActual = Url::to(['peliculas/buscar']);
$js = <<<EOT
    $('#titulo').keyup(function() {
        var q = $('#titulo').val();
        if (q == '') {
            $('#peliculas').html('');
        }
        if (!isNaN(q)) {
            return;
        }
        $.ajax({
            method: 'GET',
            url: '$url',
            data: {
                titulo: q
            },
            success: function (data, status, event) {
                $('#peliculas').html(data);
            }
        });
    });
EOT;
$this->registerJs($js);
?>
<div class="alquileres-gestionar">
    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'action' => ['alquileres/gestionar'],
    ]); ?>
        <?= $form->field($model, 'titulo') ?>
        <div class="form-group">
            <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>
</div><!-- alquileres-alquilar -->


<div id="peliculas">

</div>
