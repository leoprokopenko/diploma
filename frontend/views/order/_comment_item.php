<?php 
/* @var $model \common\models\OrderComment */
?>
<div class="panel panel-default">
    <!-- Default panel contents -->
    <div class="panel-heading"><?= \yii\helpers\Html::encode($model->author->name) ?></div>
    <div class="panel-body">
        <p>
            <?= \yii\helpers\Html::encode($model->message) ?>
        </p>
    </div>
</div>