<?php

namespace app\Repository;

use app\models\Schedule;

class TimetableShowRepository
{

    public function show(\app\DTO\TimetableShowDTO $context)
    {
        $db = Schedule::findAll([
            'organization_id' => $context->organization_id,
            'filial_id' => $context->filial_id,
            'group_id' => $context->group_id,
        ]);
        return $db;
    }

}