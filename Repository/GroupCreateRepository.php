<?php

namespace app\Repository;

use app\models\Group;

class GroupCreateRepository
{

    public function create(\app\DTO\GroupCreateDTO $context)
    {
        $db = new Group();
        $db->organization_id = $context->organization_id;
        $db->filial_id = $context->filial_id;
        $db->name = $context->name;
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