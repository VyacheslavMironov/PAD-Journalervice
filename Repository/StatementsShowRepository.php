<?php

namespace app\Repository;

use app\models\Statements;

class StatementsShowRepository
{

    public function show(\app\DTO\StatementsShowDTO $context)
    {
        $db = Statements::findOne([
            'user_id' => $context->user_id,
            'lesson_id' => $context->lesson_id,
            'day' => $context->day,
            'month' => $context->month,
            'year' => $context->year,
        ]);
        return $db;
    }

}