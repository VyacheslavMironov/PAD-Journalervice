<?php

namespace app\Repository;

use app\models\Statements;

class StatementsListRepository
{

    public function list(\app\DTO\StatementsListDTO $context)
    {
        $db = Statements::findAll([
            'user_id' => $context->user_id,
            'lesson_id' => $context->lesson_id,
            'month' => $context->month,
            'year' => $context->year,
        ]);
        return $db;
    }

}