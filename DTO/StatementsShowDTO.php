<?php

namespace app\DTO;

class StatementsShowDTO
{
    public int $user_id;
    public int $lesson_id;
    public string $day;
    public string $month;
    public string $year;

    public function __construct($user_id, $lesson_id, $day, $month, $year)
    {
        $this->user_id = $user_id;
        $this->lesson_id = $lesson_id;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
    }
}