<?php

use yii\db\Migration;

class m160523_084525_add_foreign_keys extends Migration
{
    public function up()
    {
        $this->addForeignKey('fk_client_manager', 'client', 'manager_id', 'user', 'id');
       
        $this->addForeignKey('fk_order_client', 'order', 'client_id', 'client', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_order_manager', 'order', 'manager_id', 'user', 'id');
    }

    public function down()
    {
        $this->dropForeignKey('fk_client_manager', 'client');
       
        $this->dropForeignKey('fk_order_client', 'order');
        $this->dropForeignKey('fk_order_manager', 'order');
    }
}
