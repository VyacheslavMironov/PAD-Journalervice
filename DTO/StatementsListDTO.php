<?php

namespace app\DTO;

class StatementsListDTO
{
    public int $user_id;
    public string $lesson_id;
    public string $month;
    public string $year;

    public function __construct($user_id, $lesson_id, $month, $year)
    {
        $this->user_id = $user_id;
        $this->lesson_id = $lesson_id;
        $this->month = $month;
        $this->year = $year;
    }
}