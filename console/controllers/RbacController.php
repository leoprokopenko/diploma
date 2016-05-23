<?php

namespace console\controllers;


use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = \Yii::$app->authManager;
        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $auth->add($admin);

        $manager = $auth->createRole('manager');
        $auth->add($manager);
        
        $constructor = $auth->createRole('constructor');
        $auth->add($constructor);

        $supply = $auth->createRole('supple');
        $auth->add($supply);
    }
}