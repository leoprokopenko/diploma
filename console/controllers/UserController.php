<?php

namespace console\controllers;


use common\models\User;
use yii\console\Controller;

class UserController extends Controller
{
    public function actionCreate()
    {
        $admin = User::findOne(['username' => 'admin']);

        if (!$admin) {
            $admin = new User();
            $admin->username = 'admin';
            $admin->email = 'admin@example.com';
            $admin->setPassword('admin');
            $admin->generateAuthKey();
            $admin->save();
        }
        
        $auth = \Yii::$app->authManager;
        $authorRole = $auth->getRole('admin');
        $auth->assign($authorRole, $admin->getId());
    }
}
