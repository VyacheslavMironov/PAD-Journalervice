<?php

namespace app\Repository;

use app\models\Group;

class GroupListRepository
{

    public function list(\app\DTO\GroupListDTO $context)
    {
        if (is_null($context->filial_id))
        {
            $db = Group::findAll(['organization_id' => $context->organization_id]);
        } else {
            $db = Group::findAll([
                'organization_id' => $context->organization_id,
                'filial_id' => $context->filial_id
            ]);
        }
        
        return $db;
    }

}