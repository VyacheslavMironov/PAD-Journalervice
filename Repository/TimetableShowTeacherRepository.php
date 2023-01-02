<?php

namespace app\Repository;

use app\models\Schedule;

class TimetableShowTeacherRepository
{

    public function show(\app\DTO\TimetableShowTeacherDTO $context)
    {
        $db = Schedule::findAll([
            'organization_id' => $context->organization_id,
            'teacher_id' => $context->teacher_id,
        ]);
        return $db;
    }

}