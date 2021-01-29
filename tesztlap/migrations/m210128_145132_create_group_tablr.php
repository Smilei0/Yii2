<?php

use yii\db\Migration;

/**
 * Class m210128_145132_create_group_tablr
 */
class m210128_145132_create_group_tablr extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('group', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'parent_id' => $this->integer(),
            'is_deleted' => $this->integer(), // lehetne bool de sqliteban az nincs :( 
        ]);
        
        $id = 0;

        $cmd = Yii::$app->db->createCommand();

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Parent1',
                'is_deleted' => 0,
                ])->execute();

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Parent2',
                'is_deleted' => 0,
                ])->execute();

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Child1/1',
                'parent_id' => 0,
                'is_deleted' => 0,
                ])->execute();

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Child1/2',
                'parent_id' => 0,
                'is_deleted' => 0,
                ])->execute();                    
                
            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Standalone0',
                'is_deleted' => 0,
                ])->execute();     

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Child2/1',
                'parent_id' => 1,
                'is_deleted' => 0,
                ])->execute();                                 

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Standalone1',
                'is_deleted' => 0,
                ])->execute();                  
            
            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Standalone2',
                'is_deleted' => 0,
                ])->execute();    

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Deleted1',
                'is_deleted' => 1,
                ])->execute();             

            $cmd->insert('group', [
                'id' => $id++,
                'name' => 'Last1',
                'is_deleted' => 0,
                ])->execute();                                           

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210128_145132_create_group_tablr cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210128_145132_create_group_tablr cannot be reverted.\n";

        return false;
    }
    */
}
