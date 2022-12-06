<?php

namespace app\Repository;

use app\models\UserGroup;

class UserGroupRemoveRepository
{
    public function remove(\app\DTO\UserGroupRemoveDTO $context)
    {
        $db = UserGroup::findOne([
            'group_id' => $context->group_id,
            'user_id' => $context->user_id
        ]);
        $db->delete();
        return true;
    }
}