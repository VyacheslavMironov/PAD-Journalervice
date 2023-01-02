<?php

namespace app\DTO;

class StatementsCreateDTO
{
    public int $user_id;
    public int $lesson_id;
    public int $user_from;
    public string $evaluation_type;
    public string $value;
    public string $day;
    public string $month;
    public string $year;
    public string $date_in;

    public function __construct($user_id, $lesson_id, $user_from, $evaluation_type, $value, $day, $month, $year, $date_in)
    {
        $this->user_id = $user_id;
        $this->lesson_id = $lesson_id;
        $this->user_from = $user_from;
        $this->evaluation_type = $evaluation_type;
        $this->value = $value;
        $this->day = $day;
        $this->month = $month;
        $this->year = $year;
        $this->date_in = $date_in;
    }
}
