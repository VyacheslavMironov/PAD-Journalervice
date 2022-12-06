<?php

namespace app\Repository;

use app\models\UserGroup;

class UserGroupCreateRepository
{
    public function create(\app\DTO\UserGroupCreateDTO $context)
    {
        $db = new UserGroup();
        $db->user_id = $context->user_id;
        $db->group_id = $context->group_id;
        $db->created_at = $context->created_at;
        // Проверка валидации
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return $db->errors;
        }
    }
}