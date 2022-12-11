<?php

namespace app\DTO;

class GroupDeleteDTO
{
    public int $organization_id;
    public int $filial_id;
    public int $id;

    public function __construct($organization_id, $filial_id, $id)
    {
        $this->organization_id = $organization_id;
        $this->filial_id = $filial_id;
        $this->id = $id;
    }
}
