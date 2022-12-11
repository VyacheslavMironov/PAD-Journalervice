<?php

namespace app\Repository;

use app\models\Group;

class GroupDeleteRepository
{

    public function delete(\app\DTO\GroupDeleteDTO $context)
    {
        $db = Group::findOne([
            'organization_id' => $context->organization_id,
            'id' => $context->id
        ]);
        $db->delete();
        return true;
    }

}