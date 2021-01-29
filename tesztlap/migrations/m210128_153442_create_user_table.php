<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210128_153442_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'password' => $this->string(),
            'authKey' => $this->string(),
            'accessToken' => $this->string()
        ]);

        $cmd = Yii::$app->db->createCommand();

        $id = 0;

        $cmd->insert('users', [
            'id' => $id++,
            'username' => 'Student',
            'password' => '0000',
            'authKey' => '01',
            'accessToken' => '10',
            ])->execute();
            
        $cmd->insert('users', [
            'id' => $id++,
            'username' => 'Admin',
            'password' => '0000',
            'authKey' => '02',
            'accessToken' => '20',
            ])->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
    }
}
