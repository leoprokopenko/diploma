<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$comments = $model->orderComments;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'client_id',
            'manager_id',
            'created_at',
            'updated_at',
            'title',
            'description:ntext',
        ],
    ]) ?>
    
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
