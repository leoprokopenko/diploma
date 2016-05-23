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
        <?php if (Yii::$app->user->can('manager')) {?>
            <?= Html::a('Создать заявку', ['create'], ['class' => 'btn btn-success']) ?>
        <?php } ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' => function(\common\models\Order $model, $key, $index, $grid) {
            switch ($model->role) {
                case 'constructor':
                    $colorClass = 'info';
                    break;
                case 'manager':
                    $colorClass = 'danger';
                    break;
                case 'supply':
                    $colorClass = 'success';
                    break;
                default:
                    $colorClass = 'default';
            }

            return ['class' => $colorClass];
        },
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
