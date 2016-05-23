<?php 
/* @var $model \common\models\OrderComment */
?>
<?php

switch ($model->author->role) {
    case 'constructor':
        $colorClass = 'panel-info';
        break;
    case 'manager':
        $colorClass = 'panel-danger';
        break;
    case 'supply':
        $colorClass = 'panel-success';
        break;
    default:
        $colorClass = 'panel-default';
}
?>

<div class="panel <?= $colorClass ?>">
    <!-- Default panel contents -->
    <div class="panel-heading"><?= \yii\helpers\Html::encode($model->author->name) ?> (<?= $model->author->roleName ?>)</div>
    <div class="panel-body">
        <p>
            <?= \yii\helpers\Html::encode($model->message) ?>
        </p>
    </div>
</div>