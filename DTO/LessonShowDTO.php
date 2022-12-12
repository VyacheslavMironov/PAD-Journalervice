<?php

namespace app\DTO;

class LessonShowDTO
{
    public int|null $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}