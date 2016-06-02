<?php

namespace frontend\controllers;

use common\models\Image;
use yii\helpers\FileHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\UploadedFile;

class MediaController extends Controller
{
    public function actionUpload($id)
    {
        if (\Yii::$app->request->isGet) {
            $images = Image::find()
                ->where(['order_id' => $id]);
            $files = [];

            foreach ($images->each() as $image) {
                $files[] = [
                    'name' => $image->name,
                    'size' => $image->size,
                    "url" => '/img/temp/' . DIRECTORY_SEPARATOR . $image->fileName,
                    "thumbnailUrl" => '/img/temp/' . DIRECTORY_SEPARATOR . $image->fileName,
                    "deleteUrl" => Url::to(['/media/delete', 'name' => $image->fileName]),
                    "deleteType" => "POST"
                ];
            }

            return Json::encode([
                'files' => $files,
            ]);
        }

        $imageFile = UploadedFile::getInstanceByName('Order[image]');
        $directory = \Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true);
        }
        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;

            $image = new Image();
            $image->order_id = $id;
            $image->fileName = $fileName;
            $image->name = $fileName;
            $image->size = $imageFile->size;

            if ($imageFile->saveAs($filePath) && $image->save()) {
                $path = '/img/temp/' . DIRECTORY_SEPARATOR . $fileName;
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
        $directory = \Yii::getAlias('@frontend/web/img/temp') . DIRECTORY_SEPARATOR;
        if (is_file($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
            Image::deleteAll(['fileName' => $name]);
        }
        $files = FileHelper::findFiles($directory);
        $output = [];
        foreach ($files as $file){
            $path = '/img/temp/' . DIRECTORY_SEPARATOR . basename($file);
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
