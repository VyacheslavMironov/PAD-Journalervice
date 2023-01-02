<?php

namespace app\DTO;

class TimetableShowTeacherDTO
{
    public int $organization_id;
    public int $teacher_id;

    public function __construct($organization_id, $teacher_id)
    {
        $this->organization_id = $organization_id;
        $this->teacher_id = $teacher_id;
    }
}
