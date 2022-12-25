<?php

namespace app\DTO;

class TimetableCreateDTO
{
    public int $organization_id;
    public int $filial_id;
    public int $group_id;
    public int $lesson_id;
    public int $teacher_id;
    public string $day_in;
    public string $time_to;
    public string $time_end;

    public function __construct($organization_id, $filial_id, $group_id, $lesson_id, $teacher_id, $day_in, $time_to, $time_end)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
        $this->group_id = $group_id;
        $this->lesson_id = $lesson_id;
        $this->teacher_id = $teacher_id;
        $this->day_in = $day_in;
        $this->time_to = $time_to;
        $this->time_end = $time_end;
    }
}
