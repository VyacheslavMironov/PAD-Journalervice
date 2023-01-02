<?php

namespace app\DTO;

class UserValueListDTO
{
    public int $organization_id;
    public int $user_id;
    public string $month;
    public string $year;

    public function __construct($organization_id, $user_id, $month, $year)
    {
        $this->organization_id = $organization_id;
        $this->user_id = $user_id;
        $this->month = $month;
        $this->year = $year;
    }
}
