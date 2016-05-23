<?php

namespace frontend\assets;


use yii\web\AssetBundle;

class CommentAsset extends AssetBundle
{
    public $js = [
        'js/comment.js',
    ];

    public $depends = [
        '\yii\web\JqueryAsset',
    ];
}