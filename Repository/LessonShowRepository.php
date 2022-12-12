<?php

namespace app\Repository;

use app\models\Lessons;

class LessonShowRepository
{
    public function show(\app\DTO\LessonShowDTO $context)
    {
        $db = Lessons::findOne(['id' => $context->id]);
        return $db;
    }
}