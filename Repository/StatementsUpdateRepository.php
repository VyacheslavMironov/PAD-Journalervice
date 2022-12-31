<?php

namespace app\Repository;

use app\models\Statements;

class StatementsUpdateRepository
{
    public function update(\app\DTO\StatementsUpdateDTO $context)
    {
        $db = Statements::findOne(['id' => $context->id]);
        $db->user_from = $context->user_from;
        $db->value = $context->value;
        $db->updated_at = $context->updated_at;
        // Валидация параметров
        if ($db->validate())
        {
            $db->save();
            return $db;
        } else {
            return ['response' => 'Данные не сохранены!', 'message' => $db->errors];
        }
    }
}