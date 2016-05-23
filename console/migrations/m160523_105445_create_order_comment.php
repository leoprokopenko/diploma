<?php

use yii\db\Migration;

/**
 * Handles the creation for table `order_comment`.
 */
class m160523_105445_create_order_comment extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('order_comment', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'author_id' => $this->integer()->notNull(),
            'message' => $this->text()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
        
        $this->addForeignKey('fk_order_comment_order', 'order_comment', 'order_id', 'order', 'id');
        $this->addForeignKey('fk_order_comment_author', 'order_comment', 'author_id', 'user', 'id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_order_comment_order', 'order_comment');
        $this->dropForeignKey('fk_order_comment_author', 'order_comment');
        
        $this->dropTable('order_comment');
    }
}
