<?php

use yii\db\Migration;

/**
 * Class m210127_195322_init_rbac
 */
class m210127_195322_init_rbac extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $managger = $auth->createPermission('ManageGroups');
        $managger->description = 'Manages groups and stuff.';
        $auth->add($managger);
    
        $admin = $auth->createRole('Admin');
        $student = $auth->createRole('Student');
        $auth->add($admin);
        $auth->add($student);
        $auth->addChild($admin, $managger);

        $auth->assign($admin, 1);
        $auth->assign($student, 0);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210127_195322_init_rbac cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210127_195322_init_rbac cannot be reverted.\n";

        return false;
    }
    */
}
