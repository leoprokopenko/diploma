<?php

use yii\db\Migration;

/**
 * Handles adding role to table `order`.
 */
class m160523_163721_add_role_to_order extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('order', 'role', $this->string(15)->notNull()->defaultValue('manager'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('order', 'role');
    }
}
