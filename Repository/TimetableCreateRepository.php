<?php

namespace app\Repository;

use app\models\Schedule;

class TimetableCreateRepository
{

    public function create(\app\DTO\TimetableCreateDTO $context)
    {
        $db = new Schedule();
        $db->organization_id = $context->organization_id;
        $db->filial_id = $context->filial_id;
        $db->group_id = $context->group_id;
        $db->lesson_id = $context->lesson_id;
        $db->teacher_id = $context->teacher_id;
        $db->day_in = $context->day_in;
        $db->time_to = $context->time_to;
        $db->time_end = $context->time_end;
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