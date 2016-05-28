<?php

use yii\db\Migration;

/**
 * Handles the creation for table `images`.
 */
class m160528_161345_create_images extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('image', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'size' => $this->integer()->notNull(),
            'fileName' => $this->string()->notNull(),
        ]);
        
        $this->addForeignKey('fk_image_order', 'image', 'order_id', 'order', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk_image_order', 'image');
        $this->dropTable('image');
    }
}
