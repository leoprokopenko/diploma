<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::a('Добавить клиента', ['client/create']) ?>
    <?= $form->field($model, 'client_id')->listBox(\common\models\Client::find()
        ->select(['name', 'id'])
        ->indexBy('id')
        ->column()
    ) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>



    <?= \dosamigos\fileupload\FileUploadUI::widget([
        'model' => $model,
        'attribute' => 'image',
        'url' => ['media/upload', 'id' => $model->id],
        'gallery' => true,
        'load' => true,
        'fieldOptions' => [
            'accept' => 'image/*'
        ],
        'clientOptions' => [
            'maxFileSize' => 2000000
        ],
        // ...
        'clientEvents' => [
            'fileuploaddone' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
            'fileuploadfail' => 'function(e, data) {
                                    console.log(e);
                                    console.log(data);
                                }',
        ],
    ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать заявку' : 'Обновить заявку', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
