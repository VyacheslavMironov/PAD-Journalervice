<?php

namespace app\DTO;

class StatementsUpdateDTO
{
    public int $id;
    public int $user_from;
    public string $value;
    public string $updated_at;

    public function __construct($id, $user_from, $value, $updated_at)
    {
        $this->id = $id;
        $this->user_from = $user_from;
        $this->value = $value;
        $this->updated_at = $updated_at;
    }
}