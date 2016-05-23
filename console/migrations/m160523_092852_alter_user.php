<?php

use yii\db\Migration;

class m160523_092852_alter_user extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'name', $this->string());
        $this->addColumn('user', 'phone', $this->string(20));
    }

    public function down()
    {
        $this->dropColumn('user', 'name');
        $this->dropColumn('user', 'phone');
    }
}
