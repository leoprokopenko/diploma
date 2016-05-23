<?php

use yii\db\Migration;

/**
 * Handles the creation for table `client_table`.
 */
class m160523_083924_create_client_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('client', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'phone' => $this->string(20),
            'address' => $this->string(),
            'comment' => $this->text(),
            'manager_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('client');
    }
}
