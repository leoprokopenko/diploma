<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Клиент',
                'attribute' => 'client.name',
            ],
            [
                'label' => 'Менеджер',
                'attribute' => 'manager.name',
            ],
            'title',
            [
                'label' => 'Дата заведения заявки',
                'attribute' => 'created_at',
                'format' => 'datetime',
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
