<?php

namespace app\Repository;

use app\models\Group;

class GroupShowRepository
{

    public function show(\app\DTO\GroupShowDTO $context)
    {
        $db = Group::findOne([
            'organization_id' => $context->organization_id,
            'filial_id' => $context->filial_id,
            'id' => $context->id
        ]);
        return $db;
    }

}