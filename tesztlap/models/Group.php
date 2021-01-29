<?php

namespace app\models;
use yii\db\ActiveRecord;

class Group extends \yii\db\ActiveRecord
{
    
    /**
    * Returns the group hierarchy in an array
    * Returns only parent groups if passed true 
    * @param boolean $parents_only default false
    * @return array
    *
    */
    public static function getGroups($parents_only = false)
    {        
        if($parents_only)
        {
            return self::findAll(['parent_id' => NULL,'is_deleted' => 0 ]);
        }
        else
        {
            return self::findAll(['is_deleted' => 0]);
        }

    }
}