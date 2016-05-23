<?php

use yii\db\Migration;

class m160523_082914_zayavka extends Migration
{
    public function up()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'manager_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
        ]);
    }

    public function down()
    {
        $this->dropTable('order');
    }
}
