<?= \yii\grid\GridView::widget([
    'id' => 'peliculasGrid',
    'dataProvider' => $dataProvider,
    'columns' => [
        'titulo',
        'anio',
        'duracion',
    ],
    'tableOptions' => [
        'class' => 'table table-bordered table-hover',
    ],
]) ?>
