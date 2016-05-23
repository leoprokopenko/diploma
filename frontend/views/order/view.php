<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$comments = $model->orderComments;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if ($model->manager_id === Yii::$app->user->getId()) {?>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить заявку', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        <?php } ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'label' => 'Менеджер',
                'attribute' => 'manager.name',
            ],
            [
                'label' => 'Клиент',
                'attribute' => 'client.name',
            ],
            'title',
            [
                'label' => 'Дата заведения заявки',
                'attribute' => 'created_at',
                'format' => 'datetime',
            ],
            
            'description:ntext',
        ],
    ]) ?>

    <?= $this->render('_file_upload', [
        'model' => $model,
    ]) ?>

    <h2>Ход работы</h2>
    
    <div class="comments-block">
        <?php foreach ($comments as $comment) {?>
            <?= $this->render('_comment_item', [
                'model' => $comment,
            ]) ?>
        <?php } ?>
    </div>

    <?= $this->render('_comment_form', [
        'order_id' => $model->id,
    ]) ?>
</div>
