<?php

use yii\db\Migration;

/**
 * Handles the creation for table `manager_table`.
 */
class m160523_084146_create_manager_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('manager', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'phone' => $this->string(20),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('manager');
    }
}
