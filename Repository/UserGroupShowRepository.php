<?php

namespace app\Repository;

use app\models\Users;
use app\models\UserGroup;

class UserGroupShowRepository
{
    public $arr = array();
    
    public function show(\app\DTO\UserGroupShowDTO $context)
    {
        $user_db = Users::findAll([
            'organization_id' => $context->organization_id,
            'filial_id' => $context->filial_id
        ]);

        foreach ($user_db as $value)
        {
            if (trim($value->role) == 'Студент')
            {
                $db = UserGroup::findOne([
                    'group_id' => $context->group_id,
                    'user_id' => $value->id
                ]);
                
                if ($db != null)
                {
                    array_push($this->arr, $value);
                }
            }
        }
        return $this->arr;
    }

}