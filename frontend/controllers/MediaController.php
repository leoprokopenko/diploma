<?php

namespace frontend\controllers;

use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class MediaController extends Controller
{
    public function actionUpload()
    {
        \Yii::$app->session->open();
        $imageFile = UploadedFile::getInstanceByName('Order[image]');
        $directory = \Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR . \Yii::$app->session->id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            mkdir($directory);
        }
        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '/img/temp/' . \Yii::$app->session->id . DIRECTORY_SEPARATOR . $fileName;
                return Json::encode([
                    'files' => [[
                        'name' => $fileName,
                        'size' => $imageFile->size,
                        "url" => $path,
                        "thumbnailUrl" => $path,
                        "deleteUrl" => Url::to(['/media/delete', 'name' => $fileName]),
                        "deleteType" => "POST"
                    ]]
                ]);
            }
        }
        return '';
    }

    public function actionDelete($name)
    {
        \Yii::$app->session->open();
        $directory = \Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR . \Yii::$app->session->id;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file){
            $path = '/img/temp/' . \Yii::$app->session->id . DIRECTORY_SEPARATOR . basename($file);
            $output['files'][] = [
                'name' => basename($file),
                'size' => filesize($file),
                "url" => $path,
                "thumbnailUrl" => $path,
                "deleteUrl" => 'image-delete?name=' . basename($file),
                "deleteType" => "POST"
            ];
        }
        return Json::encode($output);
    }
}