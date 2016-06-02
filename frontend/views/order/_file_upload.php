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
]);
?>
