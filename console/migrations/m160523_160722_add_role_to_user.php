<?php

use yii\db\Migration;

/**
 * Handles adding role to table `user`.
 */
class m160523_160722_add_role_to_user extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('user', 'role', $this->string(15)->notNull()->defaultValue('manager'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('user', 'role');
    }
}
