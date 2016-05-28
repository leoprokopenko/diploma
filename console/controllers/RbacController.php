<?php

namespace console\controllers;


use yii\console\Controller;
use yii\rbac\ManagerInterface;

class RbacController extends Controller
{
    /**
     * @var ManagerInterface
     */
    private $auth;
    
    public function init()
    {
        $this->auth = \Yii::$app->authManager;
    }
    
    public function actionInit()
    {
        
        $this->auth->removeAll();

        $admin = $this->auth->createRole('admin');
        $this->auth->add($admin);

        $manager = $this->auth->createRole('manager');
        $this->auth->add($manager);
        
        $constructor = $this->auth->createRole('constructor');
        $this->auth->add($constructor);

        $supply = $this->auth->createRole('supple');
        $this->auth->add($supply);
        
        
    }
    
    public function actionAddBoss()
    {
        $boss = $this->auth->createRole('boss');
        $this->auth->add($boss);
    }
}
