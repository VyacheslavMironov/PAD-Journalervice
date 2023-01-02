<?php

namespace app\Repository;

use app\models\Users;
use app\models\Lessons;
use app\models\Statements;

class UserValueListRepository
{
    public $arr = array();
    
    public function show(\app\DTO\UserValueListDTO $context)
    {
        $db_lessons = Lessons::findAll(['organization_id' => $context->organization_id]);

        foreach ($db_lessons as $lesson) {
            $db = Statements::findAll([
                'user_id' => $context->user_id,
                'lesson_id' => $lesson->id,
                'month' => $context->month,
                'year' => $context->year
            ]);
            
            foreach ($db as $value) {
                $this->arr[$lesson->name]['values'][] = $value;
            }
        }
        
        return $this->arr;
    }

}