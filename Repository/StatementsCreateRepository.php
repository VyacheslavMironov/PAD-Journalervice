<?php

namespace app\Repository;

use app\models\Statements;

class StatementsCreateRepository
{

    public function create(\app\DTO\StatementsCreateDTO $context)
    {
        $db = new Statements();
        $db->user_id = $context->user_id;
        $db->lesson_id = $context->lesson_id;
        $db->user_from = $context->user_from;
        $db->evaluation_type = $context->evaluation_type;
        $db->value = $context->value;
        $db->day = $context->day;
        $db->month = $context->month;
        $db->year = $context->year;
        $db->created_at = $context->date_in;
        $db->updated_at = $context->date_in;
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